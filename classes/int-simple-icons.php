<?php

namespace Squelch\TabsAndAccordions;

// No direct access

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Integrate Squelch Tabs and Accordions with "Popular Brand Icons - Simple Icons".
 */
final class IntSimpleIcons {

    /**
     * Creates a new IntSimpleIcons object
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
     * Filters Simple Icons. Anything that doesn't begin with https://, http://, data:image/, or fa- is assumed to be
     * a Simple Icon, IF Simple Icons is activated.
     *
     * @var string              $icon               The icon built by the core plugin
     * @var string              $icon_attr          The original attribute specified by the user
     * @var string              $alt                The alt string specified by the user (ignored)
     * @var int|null            $w                  Width of the icon
     * @var int|null            $h                  Height of the icon (ignored, width is used for both dimensions)
     * @var TabsAndAccordions   $staas              TabsAndAccordions plugin class (ignored)
     * @return string                               Icon HTML
     */
    public function icon( $icon, $icon_attr, $alt, $w, $h, $staas ) {

        include_once ABSPATH . 'wp-admin/includes/plugin.php';

        if ( ! preg_match( '/^(http[s]?:\/\/|data:image\/|fa-)/', $icon_attr ) ) {

            // Popular Brand Icons - Simple Icons plugin (on 5,000+ websites):

            if ( \is_plugin_active( 'simple-icons/simple-icons.php' ) ) {
                $w = $w ?? '1.2rem';
                if ( $w === '' ) $w = '1.2rem';
                $sc = "[simple_icon name=\"{$icon_attr}\" class=\"squelch-taas-icon\" size=\"{$w}\"]";
                return do_shortcode( $sc );
            }

        }

        // Use the STaAS icon:

        return $icon;

    }

}

