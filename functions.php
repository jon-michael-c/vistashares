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

function getMenu($location)
{


    $menuItems = wp_get_nav_menu_items($location);
    $menuArray = [];

    // First, convert all menu items to associative arrays and index by ID
    if ($menuItems) {
        foreach ($menuItems as $item) {
            $classes = implode(' ', $item->classes);
            if (get_the_ID() == $item->object_id) {
                $classes .= ' current-menu-item';
            }

            $menuArray[$item->ID] = [
                'id' => $item->ID,
                'title' => html_entity_decode($item->title),
                'url' => $item->url,
                'target' => $item->target,
                'parent_id' => $item->menu_item_parent,
                'classes' => $classes,
                'children' => [],
                'current' => $item->current ? true : false,
            ];
        }
    }

    // Next, iterate through the array and assign children to their parents
    foreach ($menuArray as $id => &$menuItem) {
        if ($menuItem['parent_id'] != 0) { // If item has a parent
            $menuArray[$menuItem['parent_id']]['children'][] = &$menuItem; // Add it to the parent's 'children' array
        }
    }
    unset($menuItem); // Break reference to the last element

    // Filter out the child items to get a list of top-level items only
    $menuTree = array_filter($menuArray, function ($item) {
        return $item['parent_id'] == 0;
    });

    return array_values($menuTree); // Re-index and return 
}




add_action('init', 'register_team_member_fields');
function register_team_member_fields()
{
    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(
            array(
                'key' => 'group_6153e0a2a9b7e',
                'title' => 'Team Member Fields',
                'fields' => array(
                    array(
                        'key' => 'field_6153e0b0a9b7f',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'team-member',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            )
        );

    endif;
}

add_action('init', 'register_team_member_locations_taxonomy');

function register_team_member_locations_taxonomy()
{
    $labels = array(
        'name' => _x('Locations', 'taxonomy general name'),
        'singular_name' => _x('Location', 'taxonomy singular name'),
        'search_items' => __('Search Locations'),
        'all_items' => __('All Locations'),
        'parent_item' => __('Parent Location'),
        'parent_item_colon' => __('Parent Location:'),
        'edit_item' => __('Edit Location'),
        'update_item' => __('Update Location'),
        'add_new_item' => __('Add New Location'),
        'new_item_name' => __('New Location Name'),
        'menu_name' => __('Locations'),
    );

    $args = array(
        'hierarchical' => true, // Make it hierarchical (like categories)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'location'),
    );

    register_taxonomy('locations', array('team-member'), $args);
}

// Enqueue the JavaScript file and localize the script
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('contact-form-script', get_template_directory_uri() . '/resources/scripts/components/ContactForm.js', ['jquery'], null, true);

    // Localize script to include the AJAX URL and a nonce for security
    wp_localize_script('contact-form-script', 'ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('contact_form_nonce')
    ]);
});

add_action('after_setup_theme', 'register_custom_thumbnail_size');

function register_custom_thumbnail_size()
{
    add_image_size('sm', 250, 250, true);
}

function add_google_analytics_code()
{
    $google_analytics_code = get_field('google_analytics_snippet', 'option');
    if ($google_analytics_code) {
        // Clean up any potential issues with the code
        $google_analytics_code = str_replace(['“', '”', '‘', '’'], ['"', '"', "'", "'"], $google_analytics_code);
        echo $google_analytics_code;
    }
}
add_action('wp_head', 'add_google_analytics_code', 1);

function add_body_code()
{
    $body_code = get_field('body_code', 'option');
    if ($body_code) {
        // Clean up any potential issues with the code
        $body_code = str_replace(['“', '”', '‘', '’'], ['"', '"', "'", "'"], $body_code);
        echo $body_code;
    }
}
add_action('wp_body_open', 'add_body_code', 1);

// Disable support for comments and trackbacks in post types
function disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'disable_comments_post_types_support');

// Close comments on the front-end
function disable_comments_status()
{
    return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove comments links from admin bar
function disable_comments_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'disable_comments_admin_bar');
