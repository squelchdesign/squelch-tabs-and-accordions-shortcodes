<?php

namespace Squelch\TabsAndAccordions;

// No direct access

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Integrate Squelch Tabs and Accordions with Font Awesome.
 */
final class IntFontAwesome {

    /**
     * Creates a new IntFontAwesome object
     */
    public function __construct() {
        $this->hooks();
    }

    /**
     * Sets up any hooks needed by this class.
     */
    public function hooks() {
        add_filter( 'squelch_taas_icon', [ $this, 'icon' ], 10, 6 );
    }

    /**
     * Filters Font Awesome icons (specified with an fa-)
     *
     * @var string              $icon               The icon built by the core plugin
     * @var string              $icon_attr          The original attribute specified by the user
     * @var string              $alt                The alt string specified by the user (ignored)
     * @var int|null            $w                  Width of the icon (ignored)
     * @var int|null            $h                  Height of the icon (ignored)
     * @var TabsAndAccordions   $staas              TabsAndAccordions plugin class (ignored)
     * @return string                               Icon HTML
     */
    public function icon( $icon, $icon_attr, $alt, $w, $h, $staas ) {

        include_once ABSPATH . 'wp-admin/includes/plugin.php';

        if ( preg_match( '/^fa-/', $icon_attr ) ) {

            // Official Font Awesome plugin (on 400,000+ websites):

            if ( \is_plugin_active( 'font-awesome/index.php' ) ) {
                $icon_attr = str_replace( 'fa-', '', $icon_attr );
                $sc = "[icon name=\"{$icon_attr}\"]";
                return do_shortcode( $sc );
            }

            // "Better Font Awesome" plugin (on 100,000+ websites):

            if ( \is_plugin_active( 'better-font-awesome/better-font-awesome.php' ) ) {
                $sc = "[icon name=\"{$icon_attr}\"]";
                return do_shortcode( $sc );
            }

            // Doesn't look like there's any Font Awesome plugin available that we can use, strip the icon:

            return '';

        }

        return $icon;

    }

}

