<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (!function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });


// Enqueue the JavaScript file and localize the script
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('contact-form-script', get_template_directory_uri() . '/resources/assets/scripts/app.js', ['jquery'], null, true);
    wp_localize_script('contact-form-script', 'ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
});

// Define the AJAX handler function
function send_contact_email()
{
    $first_name = sanitize_text_field($_POST['firstName']);
    $last_name = sanitize_text_field($_POST['lastName']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $telephone = sanitize_text_field($_POST['telephone']);
    $country = sanitize_text_field($_POST['country']);
    $investor_type = sanitize_text_field($_POST['investorType']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = 'info@vistashares.com';
    $subject = 'New Contact Form Submission from vistashares.com';
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);

    $body = "
    <html>
    <body>
    <p>First Name: " . $first_name . "</p>
    <p>Last Name: " . $last_name . "</p>
    <p>Email: " . $email . "</p>
    <p>Company: " . $company . "</p>
    <p>Telephone: " . $telephone . "</p>
    <p>Country/Region: " . $country . "</p>
    <p>Investor Type: " . $investor_type . "</p>
    <p>Message: " . $message . "</p>
    </body>
    </html>";

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success('Thank you for your message!');
    } else {
        wp_send_json_error('There was an error sending your message. Please try again later.');
    }
}

// Register the AJAX actions
add_action('wp_ajax_send_contact_email', 'send_contact_email');
add_action('wp_ajax_nopriv_send_contact_email', 'send_contact_email');
