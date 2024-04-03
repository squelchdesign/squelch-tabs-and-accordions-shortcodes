<?php

namespace Squelch\TabsAndAccordions;

// No direct access, no access to those without manage_options capability:

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! current_user_can( 'manage_options' ) ) exit;


/**
 * Add settings to the WordPress Customizer.
 */
final class Customize {

    /**
     * Creates a new Customize object
     */
    public function __construct() {

        $this->hooks();

    }

    /**
     * Sets up any hooks needed by this class.
     */
    public function hooks() {

        add_action( 'customize_register', [ $this, 'register' ] );


    }

    /**
     * Returns an associative array of themes that are available for users to enable. Automatically includes any
     * uploaded custom jQuery UI themes.
     *
     * @return array    Array of available themes
     */
    public function getAvailableThemes() {

        $themes = [
            'none'              => __( 'No theme', 'squelch-tabs-and-accordions-shortcodes' ),
            'base'              => __( 'jQuery UI: base styles only', 'squelch-tabs-and-accordions-shortcodes' ),
            'custom'            => __( 'Custom jQuery UI theme (1.9.2)', 'squelch-tabs-and-accordions-shortcodes' ),
            'custom1104'        => __( 'Custom jQuery UI theme (1.10.4)', 'squelch-tabs-and-accordions-shortcodes' ),
            'custom1114'        => __( 'Custom jQuery UI theme (1.11.4)', 'squelch-tabs-and-accordions-shortcodes' ),
            'custom1121'        => __( 'Custom jQuery UI theme (1.12.1)', 'squelch-tabs-and-accordions-shortcodes' ),
            'custom1132'        => __( 'Custom jQuery UI theme (1.13.2)', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Black Tie" is, I assume, based on the formal dress code of the same name */
            'black-tie'         => __( 'jQuery UI: Black Tie', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Blitzer" is, I assume, based on the name of one of Santa's reindeer */
            'blitzer'           => __( 'jQuery UI: Blitzer', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Cupertino" is, I assume, hinting at Apple's look and feel */
            'cupertino'         => __( 'jQuery UI: Cupertino', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Black Hive" is a dark theme with a honeycomb texture */
            'dark-hive'         => __( 'jQuery UI: Dark Hive', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Dot Luv" is a black and blue theme with a dotted texture */
            'dot-luv'           => __( 'jQuery UI: Dot Luv', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Eggplant" is an aubergine coloured theme */
            'eggplant'          => __( 'jQuery UI: Eggplant', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme based on the classic Nintendo game of the same name */
            'excite-bike'       => __( 'jQuery UI: Excite Bike', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme which is clearly based on the Flickr colours */
            'flick'             => __( 'jQuery UI: Flick', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. I *think* its name refers to classically styled American sneakers (trainers) */
            'hot-sneaks'        => __( 'jQuery UI: Hot Sneaks', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. I *think* it's based on the Ubuntu brand colours */
            'humanity'          => __( 'jQuery UI: Humanity', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a bright green jQuery UI theme */
            'le-frog'           => __( 'jQuery UI: Le Frog', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme in black and green */
            'mint-choc'         => __( 'jQuery UI: Mint Choc', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a very grey jQuery UI theme */
            'overcast'          => __( 'jQuery UI: Overcast', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme in textured greys and pale yellows */
            'pepper-grinder'    => __( 'jQuery UI: Pepper Grinder', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. "Redmond" is, I assume, hinting at Microsoft's look and feel */
            'redmond'           => __( 'jQuery UI: Redmond', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a smooth jQuery UI theme. I've no idea how you would translate the "ness" into another language! */
            'smoothness'        => __( 'jQuery UI: Smoothness', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme. I've no idea what it refers to. It's a very green and yellow theme? */
            'south-street'      => __( 'jQuery UI: South Street', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme that is very clearly based on the Windows XP style (jQuery UI is OLD) */
            'start'             => __( 'jQuery UI: Start', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a yellow jQuery UI theme */
            'sunny'             => __( 'jQuery UI: Sunny', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme based on the style of high end fashion purses and handbags */
            'swanky-purse'      => __( 'jQuery UI: Swanky Purse', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme that appears to be based on the style of the Tron films */
            'trontastic'        => __( 'jQuery UI: Trontastic', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a dark jQuery UI theme */
            'ui-darkness'       => __( 'jQuery UI: Darkness', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a light jQuery UI theme */
            'ui-lightness'      => __( 'jQuery UI: Lightness', 'squelch-tabs-and-accordions-shortcodes' ),
            /* translators: This is the name of a jQuery UI theme that is clearly based on the (dark side) of the Star Wars films */
            'vader'             => __( 'jQuery UI: Vader', 'squelch-tabs-and-accordions-shortcodes' ),
        ];

        $upl_dir = wp_upload_dir();
        $upl_dir = $upl_dir['basedir'] ?? '';

        if ( ! file_exists( trailingslashit( $upl_dir ) . 'jquery-ui-1.9.2.custom'  ) ) unset( $themes['custom'] );
        if ( ! file_exists( trailingslashit( $upl_dir ) . 'jquery-ui-1.10.4.custom' ) ) unset( $themes['custom1104'] );
        if ( ! file_exists( trailingslashit( $upl_dir ) . 'jquery-ui-1.11.4.custom' ) ) unset( $themes['custom1114'] );
        if ( ! file_exists( trailingslashit( $upl_dir ) . 'jquery-ui-1.12.1.custom' ) ) unset( $themes['custom1121'] );
        if ( ! file_exists( trailingslashit( $upl_dir ) . 'jquery-ui-1.13.2.custom' ) ) unset( $themes['custom1132'] );

        return $themes;

    }

    /**
     * Adds the plugin's settings to the WordPress Customizer
     *
     * @var WP_Customize_Manager    $custom     WordPress customizer object
     */
    public function register( $custom ) {

        $custom->add_section( 'squelch-taas', [
            'capability'        => 'manage_options',
            'title'             => __( 'Tabs and Accordions', 'squelch-tabs-and-accordions-shortcodes' ),
            'description'       => __( 'Manage the appearance and behaviour of Squelch Tabs and Accordions', 'squelch-tabs-and-accordions-shortcodes' ),
        ] );

        $custom->add_setting( 'squelch_taas_jquery_ui_theme', [
            'type'              => 'option',
            'capability'        => 'manage_options',
            'default'           => 'smoothness',
            'transport'         => 'refresh',
            'sanitize_callback' => [ $this, 'option_jquery_ui_theme_sanitize' ]
        ] );

        $custom->add_control( 'squelch_taas_jquery_ui_theme', [
            'label'             => __( 'Theme for tabs and accordions', 'squelch-tabs-and-accordions-shortcodes' ),
            'description'       => __( 'Choose the theme that will be used to render your tabs, accordions, horizontal accordions, and toggles', 'squelch-tabs-and-accordions-shortcodes' ),
            'priority'          => 10,
            'type'              => 'select',
            'section'           => 'squelch-taas',
            'choices'           => $this->getAvailableThemes(),
            'setting'           => 'smoothness'
        ] );

        $custom->add_setting( 'squelch_taas_disable_magic_url', [
            'type'              => 'option',
            'capability'        => 'manage_options',
            'default'           => false,
            'transport'         => 'refresh',
            'sanitize_callback' => [ $this, 'option_disable_magic_url_sanitize' ]
        ] );

        $custom->add_control( 'squelch_taas_disable_magic_url', [
            'label'             => __( 'Disable "Magic URLs"', 'squelch-tabs-and-accordions-shortcodes' ),
            'description'       => __( '"Magic URLs", when enabled, will rewrite the URL on each page such that users can copy and paste the address to link directly to the last clicked tab, accordion, horizontal accordion, or toggle. Tick this box if you wish to disable this behavior', 'squelch-tabs-and-accordions-shortcodes' ),
            'priority'          => 10,
            'type'              => 'checkbox',
            'section'           => 'squelch-taas'
        ] );

        $custom->add_setting( 'squelch_taas_vanity_url', [
            'type'              => 'option',
            'capability'        => 'manage_options',
            'default'           => 'squelch-taas-',
            'transport'         => 'refresh',
            'sanitize_callback' => [ $this, 'option_vanity_url_sanitize' ]
        ] );

        $custom->add_control( 'squelch_taas_vanity_url', [
            'label'             => __( 'Vanity URL prefix', 'squelch-tabs-and-accordions-shortcodes' ),
            'description'       => __( 'Text to prepend to the vanity URL, this can be customized to suit your website\'s branding', 'squelch-tabs-and-accordions-shortcodes' ),
            'priority'          => 10,
            'type'              => 'text',
            'section'           => 'squelch-taas'
        ] );

    }

    /**
     * Sanitize the value of the chosen theme to ensure it is valid.
     *
     * @var string                  $value      The theme to check
     * @var WP_Customize_Manager    $custom     The Customizer manager
     * @return string                           Sanitized value. Defaults to 'smoothness' if an invalid value is given
     */
    public function option_jquery_ui_theme_sanitize( $value, $custom ) {
        // Don't allow just any old option to be chosen, only approved themes:
        if ( ! in_array( $value, array_keys( $this->getAvailableThemes() ) ) ) $value = 'smoothness';
        return $value;
    }

    /**
     * Sanitize the value of the "Disable Magic URLs" option in the Customizer.
     *
     * @var bool                    $value      The option chosen in the Customizer
     * @var WP_Customize_Manager    $custom     The Customizer manager
     * @return bool                             A true or false value, only
     */
    public function option_disable_magic_url_sanitize( $value, $custom ) {
        return ( is_bool( $value ) ? $value : false );
    }

    /**
     * Sanitize the value of the "Vanity URL prefix" option in the Customizer.
     *
     * @var string                  $value      The chosen vanity URL prefix
     * @var WP_Customize_Manager    $custom     The Customizer manager
     * @return string                           The sanitized value
     */
    public function option_vanity_url_sanitize( $value, $custom ) {
        return sanitize_text_field( $value );
    }

}

