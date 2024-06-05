<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views that utilize this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.footer', // assuming your footer Blade file is located at resources/views/sections/footer.blade.php
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'copyright' => $this->copyright(2024),
            'footerLogo' => $this->footerLogo(),
            'socialLinks' => $this->socialLinks(),
        ];
    }

    /**
     * Returns social links.
     * 
     * @return array
     */
    public function socialLinks()
    {
        $links = [];

        if (have_rows('social_media', 'option')) { // Assuming 'social_media' is your repeater field name
            while (have_rows('social_media', 'option')):
                the_row();
                $links[] = [
                    'name' => get_sub_field('social_name'),
                    'url' => get_sub_field('social_url'),
                    'icon' => get_sub_field('social_icon'), // Adjust depending on how you store icons
                ];
            endwhile;
        }

        return $links;

    }

    /**
     * Returns the footer logo.
     * 
     * @return string
     */

    public function footerLogo()
    {
        if (!function_exists('get_field')) {
            return;
        }

        if (!get_field('footer_logo', 'option')) {
            return get_field('logo', 'option');
        }

        return get_field('footer_logo', 'option');
    }

    /**
     * Returns site copyright.
     * 
     * @param mixed $foundingYear
     * @return string
     */
    public function copyright($foundingYear)
    {
        $currentYear = date('Y');

        if ($foundingYear == $currentYear) {
            return '© ' . $foundingYear;
        }
        return '© ' . $foundingYear . ' - ' . $currentYear . ' ' . __('All rights reserved.', 'your-text-domain');

    }

}
