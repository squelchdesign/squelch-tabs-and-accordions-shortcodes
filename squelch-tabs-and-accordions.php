<?php
/**
 * Plugin Name: Squelch Tabs and Accordions Shortcodes
 * Plugin URI: http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/
 * Description: Provides shortcodes for adding tabs and accordions to your website
 * Version: 0.4.7
 * Requires at least: 4.6
 * Requires PHP: 7.4
 * Author: Matt Lowe
 * Author URI: http://squelchdesign.com/matt-lowe
 * License: GPL2
 */

/*  Copyright 2013-2024  Matt Lowe / Squelch Design  (http://squelch.it/  ... email: hi@squelchdesign.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

namespace Squelch;


// No direct access:

if ( ! defined( 'ABSPATH' ) ) exit;


final class TabsAndAccordions {

    /**
     * Plugin version string
     *
     * @var string
     */
    public $taas_plugin_ver    = '0.4.7';

    /**
     * Ensures IDs on titles are unique
     *
     * @var int
     */
    public $taas_title_counter                 = 0;

    /**
     * Ensures IDs on accordions are unique
     *
     * @var int
     */
    public $taas_accordion_counter             = 0;

    /**
     * Ensures IDs on accordion content blocks are unique
     *
     * @var int
     */
    public $taas_accordion_content_counter     = 0;

    /**
     * Ensures IDs on haccordions are unique
     *
     * @var int
     */
    public $taas_haccordion_counter            = 0;

    /**
     * Ensures IDs on haccordion content blocks are unique
     *
     * @var int
     */
    public $taas_haccordion_content_counter    = 0;

    /**
     * Ensures IDs on tabs are unique
     *
     * @var int
     */
    public $taas_tab_counter                   = -1;

    /**
     * Ensures IDs on tab content blocks are unique
     *
     * @var int
     */
    public $taas_tab_content_counter           = 0;

    /**
     * ID of the current tab group being built
     *
     * @var int
     */
    public $taas_current_tab_group             = 0;

    /**
     * Array of all tabs being built
     *
     * @var array
     */
    public $taas_tabs                          = array();

    /**
     * Ensures IDs on toggles are unique
     *
     * @var int
     */
    public $taas_toggle_counter                = 0;

    /**
     * Ensures IDs on toggle content blocks are unique
     *
     * @var int
     */
    public $taas_toggle_content_counter        = 0;

    public $integrations;



    /**
     * Create a new TabsAndAccordions object.
     */
    public function __construct() {

        $this->integrations = $this->integrations ?? new \StdClass();
        $this->hooks();

    }

    /**
     * Register all actions and filters used by this plugin.
     */
    public function hooks() {

        add_action( 'plugins_loaded',       [ $this, 'maybe_set_defaults'    ] );
        add_action( 'plugins_loaded',       [ $this, 'requires'              ] );
        add_action( 'wp_enqueue_scripts',   [ $this, 'enqueue_scripts'       ], 20 );
        add_filter( 'plugin_action_links',  [ $this, 'plugin_action_links'   ], 10, 2 );

        add_shortcode( 'accordions',        [ $this, 'accordions_shortcode'  ] );
        add_shortcode( 'subaccordions',     [ $this, 'accordions_shortcode'  ] );
        add_shortcode( 'subsubaccordions',  [ $this, 'accordions_shortcode'  ] );

        add_shortcode( 'accordion',         [ $this, 'accordion_shortcode'   ] );
        add_shortcode( 'subaccordion',      [ $this, 'accordion_shortcode'   ] );
        add_shortcode( 'subsubaccordion',   [ $this, 'accordion_shortcode'   ] );

        add_shortcode( 'haccordions',       [ $this, 'haccordions_shortcode' ] );
        add_shortcode( 'subhaccordions',    [ $this, 'haccordions_shortcode' ] );
        add_shortcode( 'subsubhaccordions', [ $this, 'haccordions_shortcode' ] );

        add_shortcode( 'haccordion',        [ $this, 'haccordion_shortcode'  ] );
        add_shortcode( 'subhaccordion',     [ $this, 'haccordion_shortcode'  ] );
        add_shortcode( 'subsubhaccordion',  [ $this, 'haccordion_shortcode'  ] );

        add_shortcode( 'tabs',              [ $this, 'tabs_shortcode'        ] );
        add_shortcode( 'subtabs',           [ $this, 'tabs_shortcode'        ] );
        add_shortcode( 'subsubtabs',        [ $this, 'tabs_shortcode'        ] );

        add_shortcode( 'tab',               [ $this, 'tab_shortcode'         ] );
        add_shortcode( 'subtab',            [ $this, 'tab_shortcode'         ] );
        add_shortcode( 'subsubtab',         [ $this, 'tab_shortcode'         ] );

        add_shortcode( 'tablinks',          [ $this, 'tablinks_shortcode'    ] );

        add_shortcode( 'toggles',           [ $this, 'toggles_shortcode'     ] );
        add_shortcode( 'subtoggles',        [ $this, 'toggles_shortcode'     ] );
        add_shortcode( 'subsubtoggles',     [ $this, 'toggles_shortcode'     ] );

        add_shortcode( 'toggle',            [ $this, 'toggle_shortcode'      ] );
        add_shortcode( 'subtoggle',         [ $this, 'toggle_shortcode'      ] );
        add_shortcode( 'subsubtoggle',      [ $this, 'toggle_shortcode'      ] );

    }

    /**
     * Include any required classes.
     */
    public function requires() {

        if ( current_user_can( 'manage_options' ) ) {
            require_once( 'classes/customize.php' );
            $this->customize = new \Squelch\TabsAndAccordions\Customize();
        }

        require_once( 'classes/int-fontawesome.php' );
        $this->integrations->fontawesome = new \Squelch\TabsAndAccordions\IntFontAwesome();

        require_once( 'classes/int-simple-icons.php' );
        $this->integrations->simpleicons = new \Squelch\TabsAndAccordions\IntSimpleIcons();

    }

    /**
     * Ensure the default options are set, if they aren't already
     */
    public function maybe_set_defaults() {

        if (get_option( 'squelch_taas_v' ) != $this->taas_plugin_ver) {
            // Upgrade, ensure the appropriate defaults are set
            $this->set_defaults();
            update_option('taas_v', $this->taas_plugin_ver);
        }

    }

    /**
     * Set defaults
     */
    public function set_defaults() {
        // Default options
        $this->set_default_option( 'squelch_taas_jquery_ui_theme', 'smoothness' );
    }



    /* =Shortcodes
    ---------------------------------------------------------------------------- */

    /**
     * [accordions] shortcode
     *
     * Attributes:
     *   title          The title shown above the accordion
     *   disabled       Disables or enables the accordion
     *   active         Index of the active pane. Set to false to collapse all
     *   autoheight     Makes all panes the same height, based on the longest pane
     *   collapsible    Whether all panes can be closed at once
     *   animated       Not yet supported: Will allow choosing of animation
     *   clearstyle     Not yet supported: Will clear height/overflow after animation
     *   event          Not yet supported: Will allow selecting of event that fires opening, click or mouseover
     *   fillspace      Not yet supported: If true, accordion will occupy full height of its parent element
     */
    public function accordions_shortcode( $atts, $content ) {

        $atts = wp_parse_args( $atts, [
            'title'         => '',
            'title_header'  => 'h2',
            'disabled'      => false,
            'active'        => false,
            'autoheight'    => false,
            'collapsible'   => true
        ] );

        list( $content, $title, $title_header, $disabled, $active, $autoheight, $collapsible, $before ) = [
            $this->tidy_do_shortcode( $content ),
            $atts['title'],
            $atts['title_header'],
            $atts['disabled'],
            $atts['active'],
            $atts['autoheight'],
            $atts['collapsible'],
            ''
        ];

        $html_atts = $this->arr_to_atts( [
            'data-active'       => esc_attr( $active ),
            'data-disabled'     => ( $disabled    == "true"  ? 'true' : 'false' ),
            'data-autoheight'   => ( $autoheight  == "true"  ? 'true' : 'false' ),
            'data-collapsible'  => ( $collapsible == "true"  ? 'true' : 'false' ),
            'id'                => "squelch-taas-accordion-{$this->taas_accordion_counter}",
            'class'             => 'squelch-taas-accordion squelch-taas-override'
        ] );

        $this->taas_accordion_counter ++;

        if ( empty( $title ) ) return "<div{$html_atts}>{$content}</div>\n";
        return $this->render_title( $title, $title_header ) . "<div{$html_atts}>{$content}</div>\n";

    }


    /**
     * [accordion] shortcode
     *
     * Attributes:
     *   title      The title shown in the heading of this pane
     */
    public function accordion_shortcode( $atts, $content ) {

        $vanity_url = $this->get_vanity_url();

        $defaults = array(
            'title'     => ' &nbsp; &nbsp; &nbsp; ',
            'header'    => 'h3'
        );
        $atts = wp_parse_args( $atts, $defaults );

        if ( ! in_array( $atts['header'], [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ] ) ) $atts['header'] = 'h3';

        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $content ) ) );

        $rv  = '';

        $id = "squelch-taas-header-{$this->taas_accordion_content_counter}";

        $rv .= '<'.$atts['header'].' id="'.esc_attr( $id ).'">';
        $rv .= '<a href="#'.$vanity_url.'accordion-shortcode-content-'.$this->taas_accordion_content_counter.'">';
        $rv .= esc_html( $atts['title'] );
        $rv .= '</a>';
        $rv .= '</'.$atts['header'].'>';

        $id = $vanity_url."accordion-shortcode-content-{$this->taas_accordion_content_counter}";

        $rv .= '<div id="'.$id.'" class="squelch-taas-accordion-shortcode-content squelch-taas-accordion-shortcode-content-'.$this->taas_accordion_content_counter.'">';
        $rv .= $content;
        $rv .= '</div>';

        $this->taas_accordion_content_counter ++;

        return $rv;
    }


    /**
     * [haccordions] shortcode
     *
     * Attributes:
     *   title          The title shown above the haccordion
     *   width          Width of the haccordion in px
     *   height         Height of the haccordion in px
     *   hwidth         Width of each header (vertical bars) in px
     *   activateon     "click" or "mouseover": Which user input triggers opening of slides
     *   active         Index of the header that should be active on page load
     *   speed          Duration of animation in ms
     *   autoplay       Set to true to automatically scroll through slides
     *   pauseonhover   If true the autoplay will be paused when the mouse is in the haccordion
     *   cyclespeed     Time between opening each slide (when autoplay is true)
     *   theme          jqueryui (default), basic, dark, light or stitch
     *   rounded        Set to true to round the corners of the haccordion
     *   enumerate      If true the slide number will be shown in each slide
     *   disabled       Not yet supported: If true the haccordion will be disabled
     */
    public function haccordions_shortcode( $atts, $content ) {

        $defaults = array(
            'title'         => '',
            'title_header'  => 'h2',
            'width'         => 960,
            'height'        => 320,
            'hwidth'        => 48,
            'activateon'    => 'click',
            'active'        => 0,
            'speed'         => 800,
            'autoplay'      => false,
            'pauseonhover'  => true,
            'cyclespeed'    => 6000,
            'theme'         => 'jqueryui',
            'rounded'       => false,
            'enumerate'     => false,
            'disabled'      => false            // unused
        );

        // jQuery-UI theme needs to default to a narrower header width
        if (empty($atts['theme']) || $atts['theme'] == 'jqueryui') {
            $defaults['hwidth'] = 28;
        }

        $atts = wp_parse_args( $atts, $defaults );
        $atts['active'] = $atts['active'] + 1;

        if ( ! in_array( $atts['title_header'], [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ] ) ) $atts['title_header'] = 'h2';


        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $this->tidy_up_shortcodes( $content ) ) ) );
        $rv  = '';

        if (!empty($atts['title'])) {
            $id     = "squelch-taas-title-{$this->taas_title_counter}";
            $class  = "squelch-taas-group-title";

            $rv .= '<'.$atts['title_header'].' id="'.$id.'" class="'.$class.'">'. esc_html( $atts['title'] ) .'</'.$atts['title_header'].'>';

            $this->taas_title_counter ++;
        }

        $data  = '';

        $data .= 'data-width="'         .esc_attr($atts['width'])         .'" ';
        $data .= 'data-height="'        .esc_attr($atts['height'])        .'" ';
        $data .= 'data-h-width="'       .esc_attr($atts['hwidth'])        .'" ';
        $data .= 'data-activate-on="'   .esc_attr($atts['activateon'])    .'" ';
        $data .= 'data-active="'        .esc_attr($atts['active'])        .'" ';
        $data .= 'data-speed="'         .esc_attr($atts['speed'])         .'" ';
        $data .= 'data-autoplay="'     .($atts['autoplay']      == "true" ? 'true' : 'false' ).'" ';
        $data .= 'data-pauseonhover="' .($atts['pauseonhover']  == "true" ? 'true' : 'false' ).'" ';
        $data .= 'data-cyclespeed="'    .esc_attr($atts['cyclespeed'])    .'" ';
        $data .= 'data-theme="'         .esc_attr($atts['theme'])         .'" ';
        $data .= 'data-rounded="'      .($atts['rounded']       == "true" ? 'true' : 'false' ).'" ';
        $data .= 'data-enumerate="'    .($atts['enumerate']     == "true" ? 'true' : 'false' ).'"';

        $id     = "squelch-taas-haccordion-{$this->taas_haccordion_counter}";
        $class  = 'squelch-taas-haccordion squelch-taas-override';

        $rv .= '<div id="'.esc_attr( $id ).'" class="'.esc_attr( $class ).'" '.$data.'>';
        $rv .= '<ol>';
        $rv .= $content;
        $rv .= '</ol>';
        $rv .= '</div>';
        $rv .= "\n";

        $this->taas_haccordion_counter ++;

        return $rv;
    }


    /**
     * [haccordion] shortcode
     *
     * Attributes:
     *   title      The title shown above the haccordion
     */
    public function haccordion_shortcode( $atts, $content ) {

        $vanity_url = $this->get_vanity_url();

        $defaults = array(
            'title' => ' &nbsp; &nbsp; &nbsp; '
        );
        $atts = wp_parse_args( $atts, $defaults );

        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $content ) ) );
        $rv  = '';

        $id = $vanity_url."haccordion-$this->taas_haccordion_content_counter";

        $rv .= '<li>';
        $rv .= '<h3 id="'.$id.'" class="squelch-taas-haccordion-shortcode">';
        $rv .= '<span>';
        $rv .= esc_html( $atts['title'] );
        $rv .= '</span>';
        $rv .= '</h3>';

        $rv .= '<div>';
        $rv .= '<div class="squelch-taas-haccordion-content">';
        $rv .= $content;
        $rv .= '</div>';
        $rv .= '</div>';
        $rv .= '</li>';

        $this->taas_haccordion_content_counter ++;

        return $rv;
    }


    /**
     * [tabs] shortcode
     *
     * Attributes:
     *   title          The title shown above the tab group
     *   disabled       If true the tabs will be disabled
     *   collapsible    If true, clicking the active tab will collapse the content into the tab bar similar to an accordion
     *   active         Index of the tab that should be selected on page load
     *   event          What event should trigger the tab: mouseover or click
     */
    public function tabs_shortcode( $atts, $content ) {

        $this->taas_tab_counter ++;

        // Save current tab group and restore it at the end of the function
        $_ctg = $this->taas_current_tab_group;
        $this->taas_current_tab_group = $this->taas_tab_counter;

        $defaults = array(
            'title'         => '',
            'title_header'  => 'h2',
            'disabled'      => false,
            'collapsible'   => false,
            'active'        => 0,
            'event'         => 'click'
        );

        $atts = wp_parse_args( $atts, $defaults );

        if ( ! in_array( $atts['title_header'], [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ] ) ) $atts['title_header'] = 'h2';

        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $this->tidy_up_shortcodes( $content ) ) ) );
        $rv  = '';

        if (!empty($atts['title'])) {
            $id     = "squelch-taas-title-{$this->taas_title_counter}";
            $class  = "squelch-taas-group-title";

            $rv .= '<'.$atts['title_header'].' id="'.$id.'" class="'.$class.'">'.esc_html( $atts['title'] ).'</'.$atts['title_header'].'>';

            $this->taas_title_counter ++;
        }

        $data  = '';

        $data .= 'data-title="'         .esc_attr( $atts['title'] )         .'" ';
        $data .= 'data-disabled="'     .($atts['disabled']    == "true" ? 'true' : 'false' ).'" ';
        $data .= 'data-collapsible="'  .($atts['collapsible'] == "true" ? 'true' : 'false' ).'" ';
        $data .= 'data-active="'        .esc_attr( $atts['active'] )        .'" ';
        $data .= 'data-event="'         .esc_attr( $atts['event'] )         .'"';

        $id     = "squelch-taas-tab-group-{$this->taas_tab_counter}";
        $class  = 'squelch-taas-tab-group squelch-taas-override';

        $rv .= '<div id="'.$id.'" class="'.$class.'" '.$data.'>';
        $rv .= '<ul>';

        // We drop the content and build the tabs from the stored contents of $this->taas_tabs

        foreach ($this->taas_tabs[$this->taas_current_tab_group] as $tab) {
            $rv .= $tab['tab'];
        }
        $rv .= '</ul>';
        foreach ($this->taas_tabs[$this->taas_current_tab_group] as $tab) {
            $rv .= $tab['content'];
        }

        $rv .= '</div>';
        $rv .= "\n";

        // Restore current tab group
        $this->taas_current_tab_group = $_ctg;

        return $rv;
    }


    /**
     * [tablinks] shortcode
     *
     * Draw a simple list of links to the individual tabs in the last [tabs]
     * shortcode.
     */
    public function tablinks_shortcode( $atts, $content, $tag ) {

        $rv = '<ul class="squelch-taas-tablinks" id="squelch-taas-tablinks-tab-group-'.$this->taas_current_tab_group.'">';

        $counter = 0;
        foreach ($this->taas_tabs[$this->taas_current_tab_group] as $tab) {
            $id = $tab['id'];

            $rv .= '<li class="squelch-taas-tablink squelch-taas-tablink-'.$this->taas_current_tab_group.'-'.$counter.'">';
            $rv .= '<a href="#'.$id.'">';
            $rv .= esc_html( $tab['title'] );
            $rv .= '</a>';
            $rv .= '</li>';

            $counter++;
        }
        $rv .= '</ul>';

        return $rv;

    }


    /**
     * [tab] shortcode
     *
     * Attributes:
     *   title      The title shown in the tab
     *   icon       URL to an icon to add to the tab
     *   iconalt    Alternative text for the icon
     *   iconw      Width of the icon
     *   iconh      Height of the icon
     *   class      An arbitrary class to add to this tab and content area
     */
    public function tab_shortcode( $atts, $content, $tag ) {

        $vanity_url = $this->get_vanity_url();

        $atts = shortcode_atts( array(
            'title'     => ' &nbsp; &nbsp; &nbsp; ',
            'icon'      => '',
            'iconw'     => '',
            'iconh'     => '',
            'iconalt'   => '',
            'class'     => '',
        ), $atts, $tag );

        $tab_class = trim( 'squelch-taas-tab '.$atts['class'] );
        $content_class = trim( $atts['class'] );

        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $content ) ) );

        $id = "squelch-taas-header-{$this->taas_tab_content_counter}";

        $tab_arr = array();

        // Build the tab
        $rv  = '';
        $rv .= '<li class="'.$tab_class.'">';
        $rv .= '<a href="#'.$vanity_url.'tab-content-'.$this->taas_current_tab_group.'-'.$this->taas_tab_content_counter.'">';

        if (!empty($atts['icon'])) {
            if (empty($atts['iconalt'])) $atts['iconalt'] = $atts['title'];

            $icon = '<img src="'.esc_attr( $atts['icon'] ).'" alt="'. esc_attr( $atts['iconalt'] ).'" class="squelch-taas-tab-icon" ';
            if (!empty($atts['iconw'])) $icon .= 'width="'.esc_attr( $atts['iconw'] ).'" ';
            if (!empty($atts['iconh'])) $icon .= 'height="'.esc_attr( $atts['iconh'] ).'" ';
            $icon .= '/> &nbsp;';

            $icon = apply_filters( 'squelch_taas_icon',
                $icon,
                trim( $atts['icon'] ),
                trim( $atts['iconalt'] ?? '' ),
                $atts['iconw'] ?? null,
                $atts['iconh'] ?? null,
                $this
            );
            $icon = apply_filters( 'squelch_taas_icon_tab',
                $icon,
                trim( $atts['icon'] ),
                trim( $atts['iconalt'] ?? '' ),
                $atts['iconw'] ?? null,
                $atts['iconh'] ?? null,
                $this
            );

            $rv .= $icon;
        }

        $rv .= esc_html( $atts['title'] );
        $rv .= '</a>';
        $rv .= '</li>';
        $tab_arr['tab'] = $rv;
        $tab_arr['id']  = $vanity_url.'tab-content-'.$this->taas_current_tab_group.'-'.$this->taas_tab_content_counter;
        $tab_arr['title']  = $atts['title'];

        // Build the tab content
        $rv  = '';
        $rv .= '<div id="'.esc_attr( $vanity_url.'tab-content-'.$this->taas_current_tab_group.'-'.$this->taas_tab_content_counter ).'" class="'.$content_class.'">';
        $rv .= $content;
        $rv .= '</div>';
        $tab_arr['content'] = $rv;

        // Push onto the tab stack
        $tabs_array = array();
        if (!empty($this->taas_tabs[$this->taas_current_tab_group])) $tabs_array = $this->taas_tabs[$this->taas_current_tab_group];
        array_push( $tabs_array, $tab_arr );
        $this->taas_tabs[$this->taas_current_tab_group] = $tabs_array;

        $this->taas_tab_content_counter ++;

        // The shortcode REMOVES the content and stores it for the tabs shortcode to use
        return '';
    }


    /**
     * [toggles] shortcode
     *
     * Attributes:
     *   title      The title to show above the toggle group
     *   speed      Length in ms, duration the animation should last for
     *   active     Which pane of the toggle should be active on page load, comma-separated
     *   theme      The theme to apply to the toggle
     *   style      DEPRECATED: Alias for 'theme', provided for compatibility with TheThe Tabs and Accordions
     */
    public function toggles_shortcode( $atts, $content ) {

        $defaults = array(
            'title'         => '',
            'title_header'  => 'h2',
            'speed'         => 800,
            'active'        => false,
            'theme'         => 'jqueryui',
        );

        $atts = wp_parse_args( $atts, $defaults );

        if ( ! in_array( $atts['title_header'], [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ] ) ) $atts['title_header'] = 'h2';


        // If shortcode has style set instead of theme then use that value for style
        if (array_key_exists( 'style', $atts )) $atts['theme'] = $atts['style'];

        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $this->tidy_up_shortcodes( $content ) ) ) );
        $rv  = '';

        if (!empty($atts['title'])) {
            $id     = "squelch-taas-title-{$this->taas_title_counter}";
            $class  = "squelch-taas-group-title";

            $rv .= '<'.$atts['title_header'].' id="'.$id.'" class="'.$class.'">'.esc_html( $atts['title'] ).'</'.$atts['title_header'].'>';

            $this->taas_title_counter ++;
        }

        $data  = '';
        $data .= 'data-speed="'.esc_attr( $atts['speed'] ).'" ';
        $data .= 'data-active="'.esc_attr( $atts['active'] ).'" ';
        $data .= 'data-theme="'.esc_attr( $atts['theme'] ).'" ';

        $id     = "squelch-taas-toggle-{$this->taas_toggle_counter}";
        $class  = 'squelch-taas-toggle squelch-taas-override';

        $rv .= '<div id="'.esc_attr( $id ).'" class="'.esc_attr( $class ).'" '.$data.'>';
        $rv .= $content;
        $rv .= '</div>';
        $rv .= "\n";

        $this->taas_toggle_counter ++;

        return $rv;

    }


    /**
     * [toggle] shortcode
     *
     * Attributes:
     *   title      The title shown in the heading of this pane
     */
    public function toggle_shortcode( $atts, $content ) {

        $vanity_url = $this->get_vanity_url();

        $defaults = array(
            'title' => ' &nbsp; &nbsp; &nbsp; '
        );
        $atts = wp_parse_args( $atts, $defaults );

        $content = do_shortcode( $this->shortcode_unautop( shortcode_unautop( $content ) ) );
        $rv  = '';

        $id = "squelch-taas-header-{$this->taas_toggle_content_counter}";

        $rv .= '<h3 id="'.esc_attr( $id ).'" class="squelch-taas-toggle-shortcode-header">';
        $rv .= '<a href="#'.esc_attr( $vanity_url.'toggle-shortcode-content-'.$this->taas_toggle_content_counter ).'">';
        $rv .= esc_html( $atts['title'] );
        $rv .= '</a>';
        $rv .= '</h3>';

        $id = $vanity_url."toggle-shortcode-content-{$this->taas_toggle_content_counter}";

        $rv .= '<div id="'.esc_attr( $id ).'" class="squelch-taas-toggle-shortcode-content squelch-taas-toggle-shortcode-content-'.$this->taas_toggle_content_counter.'">';
        $rv .= $content;
        $rv .= '</div>';

        $this->taas_toggle_content_counter ++;

        return $rv;
    }



    /* =JavaScript and CSS
    ---------------------------------------------------------------------------- */

    /**
     * Enqueue the JavaScript and CSS.
     */
    public function enqueue_scripts() {

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https:" : "http:";

        // Enqueue the JavaScript
        if ( ! is_admin() ) {
            wp_enqueue_script(
                'squelch_taas',
                plugins_url( 'js/squelch-tabs-and-accordions.min.js', __FILE__ ),
                array( 'jquery', 'jquery-ui-core', 'jquery-ui-accordion', 'jquery-ui-tabs' ),
                $this->taas_plugin_ver,
                true
            );
            wp_localize_script(
                'squelch_taas',
                'squelch_taas_options',
                array(
                    'disable_magic_url' => get_option( 'squelch_taas_disable_magic_url', false )
                )
            );

            // Enqueue the jQuery UI theme (providing something else hasn't already done so)
            if (! (wp_style_is('jquery-ui-standard-css') || wp_style_is('jquery-ui-custom-css')) ) {
                $jquery_ui_theme = get_option( 'squelch_taas_jquery_ui_theme' );

                if ('custom' == $jquery_ui_theme) {
                    $upload_dir = wp_upload_dir();
                    $upload_dir = $upload_dir['baseurl'];
                    $custom_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.9.2.custom/css/custom-theme/jquery-ui-1.9.2.custom.min.css';

                    wp_enqueue_style(
                        'jquery-ui-standard-css',
                        $custom_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );
                } elseif ('custom1104' == $jquery_ui_theme) {
                    $upload_dir = wp_upload_dir();
                    $upload_dir = $upload_dir['baseurl'];
                    $custom_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.10.4.custom/css/custom-theme/jquery-ui-1.10.4.custom.min.css';

                    wp_enqueue_style(
                        'jquery-ui-standard-css',
                        $custom_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );
                } elseif ('custom1114' == $jquery_ui_theme) {
                    $upload_dir = wp_upload_dir();
                    $upload_dir = $upload_dir['baseurl'];
                    $custom_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.11.4.custom/jquery-ui.theme.min.css';
                    $structure_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.11.4.custom/jquery-ui.structure.min.css';

                    wp_enqueue_style(
                        'jquery-ui-structure-css',
                        $structure_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );

                    wp_enqueue_style(
                        'jquery-ui-standard-css',
                        $custom_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );
                } elseif ('custom1121' == $jquery_ui_theme) {
                    $upload_dir = wp_upload_dir();
                    $upload_dir = $upload_dir['baseurl'];
                    $custom_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.12.1.custom/jquery-ui.theme.min.css';
                    $structure_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.12.1.custom/jquery-ui.structure.min.css';

                    wp_enqueue_style(
                        'jquery-ui-structure-css',
                        $structure_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );

                    wp_enqueue_style(
                        'jquery-ui-standard-css',
                        $custom_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );
                } elseif ('custom1132' == $jquery_ui_theme) {
                    $upload_dir = wp_upload_dir();
                    $upload_dir = $upload_dir['baseurl'];
                    $custom_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.13.2.custom/jquery-ui.theme.min.css';
                    $structure_css_url = trailingslashit( $upload_dir ) . 'jquery-ui-1.13.2.custom/jquery-ui.structure.min.css';

                    wp_enqueue_style(
                        'jquery-ui-structure-css',
                        $structure_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );

                    wp_enqueue_style(
                        'jquery-ui-standard-css',
                        $custom_css_url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );
                } elseif ($jquery_ui_theme != 'none') {
                    $url = apply_filters( 'squelch_taas_jquery_ui_theme_url',
                        plugins_url('css/jquery-ui/jquery-ui-1.13.2/'.$jquery_ui_theme.'/jquery-ui.min.css', __FILE__),
                        $jquery_ui_theme
                    );

                    wp_enqueue_style(
                        'jquery-ui-standard-css',
                        $url,
                        false,
                        $this->taas_plugin_ver,
                        false
                    );
                }
            }

            // Enqueue the CSS
            wp_enqueue_style(
                'squelch_taas',
                plugins_url( 'css/squelch-tabs-and-accordions.css', __FILE__),
                false,
                $this->taas_plugin_ver,
                'all'
            );

        }

    }



    /* =Helper Functions
    ---------------------------------------------------------------------------- */


    /* Useful function for stripping superfluous crap from the between shortcodes to
     * prevent autop() from ever having a chance to insert more crap.
     */
    public function tidy_up_shortcodes( $content ) {
        $rv = trim( $content );
        $rv = preg_replace( '/\]<br \/>/i',     ']', $rv );
        $rv = preg_replace( '/<br \/>\n\[/i',   '[', $rv );

        return $rv;
    }



    /**
     * Similar to shortcode_unautop: Removes </p> and <p> from the start of the
     * content and the end of the content respectively.
     *
     * @param $content The content to remove the parameter from
     * @return The cleaned up content
     */
    public function shortcode_unautop( $content ) {

        $rv = trim( $content );

        $rv = preg_replace( '/^<\/p>/i',    '', $rv );
        $rv = preg_replace( '/<p>$/i',      '', $rv );

        return $rv;

    }


    /* Set an option to a specific value, unless it has already been set.
     *
     * Parameters:
     *   opt    The option to update
     *   def    The default value
     *
     * Returns:
     *   The value of the option
     */
    public function set_default_option( $opt, $def = '' ) {
        $val = get_option( $opt, $def );
        update_option( $opt, $val );

        return $val;
    }


    /* Loads the vanity URL value and stores it globally for use.
     *
     * @return The vanity URL
     */
    public function get_vanity_url() {
        global $staas_vanity_url;

        if ($staas_vanity_url !== null) {
            $staas_vanity_url = trim($staas_vanity_url);

            if (!empty( $staas_vanity_url )) return $staas_vanity_url;
        }

        $staas_vanity_url = get_option( 'squelch_taas_vanity_url' );
        if ($staas_vanity_url === false) $staas_vanity_url = 'squelch-taas-';
        $staas_vanity_url = trim($staas_vanity_url);
        if (empty($staas_vanity_url)) $staas_vanity_url = 'squelch-taas-';

        return $staas_vanity_url;
    }


    /**
     * Takes an associative array such as [ 'id' => 'tab', 'class' => 'blue closed' ] and turns it into an HTML string
     * of attributes such as ' id="tab" class="blue closed"'. Note that a space is prepended if the string is not
     * empty, meaning the returned string can be used like, "<div{$atts}>" and it's guaranteed to be valid.
     *
     * @var array       $atts                   The array of attributes to process into a string
     * @return          string                  The HTML attributes string
     */
    public function arr_to_atts( $atts ) {

        $html = implode( ' ', array_map( function( $key, $val ) {
            return "{$key}=\"{$val}\"";
        }, array_keys( $atts ), array_values( $atts ) ) );

        if ( trim( $html ) !== '' ) return " {$html}";

        return'';

    }


    /**
     * Draw a title using the given heading element (h1, h2, h3, h4, h5, or h6)
     *
     * @var string      $title                  The title text
     * @var string      $elem                   Element (HTML tag) to use to render the title. Valid values: 'h1',
     *                                          'h2', 'h3', 'h4', 'h5', 'h6'.
     * @return          string                  Rendered title tag
     */
    public function render_title( $title, $elem = 'h2' ) {

        if ( ! in_array( $elem, [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ] ) ) $elem = 'h2';

        $html =
            "<{$elem} id=\"squelch-taas-title-{$this->taas_title_counter}\" class=\"squelch-taas-group-title\">" .
            esc_html( $title ) .
            "</{$elem}>";
        $this->taas_title_counter ++;

        return $html;

    }


    /**
     * Takes some content, tidies it up with $this->tidy_up_shortcodes(), unautop's it with shortcode_unautop(),
     * passes it through $this->shortcode_unautop(), and then finally executes do_shortcode on it. The result is then
     * returned.
     *
     * @var string      $content                The content to process
     * @return          string                  The tidied and processed content
     */
    public function tidy_do_shortcode( $content ) {
        return do_shortcode(
            $this->shortcode_unautop(
                shortcode_unautop(
                    $this->tidy_up_shortcodes(
                        $content
                    )
                )
            )
        );
    }


    /* =Configuration
    ---------------------------------------------------------------------------- */

    /**
     * Add a link to the settings screen and the documentation for the plugin to make it easier for users to find.
     */
    public function plugin_action_links( $actions, $plugin_file ) {

        if ( $plugin_file == 'squelch-tabs-and-accordions-shortcodes/squelch-tabs-and-accordions.php' ) {

            if ( current_user_can( 'manage_options' ) ) {
                $settings_url = admin_url( '/customize.php?autofocus[section]=squelch-taas' );
                $actions['settings'] = sprintf(
                    // translators: 1: An HTML link to the settings page 2: closing tag for the link
                    __( '%1$sSettings%2$s', 'squelch-tabs-and-accordions-shortcodes' ),
                    '<a href="' . $settings_url . '">',
                    '</a>'
                );
            }

            $actions['docs']     = sprintf(
                // translators: 1: An HTML link to the plugin documentation 2: closing tag for the link
                __( '%1$sDocumentation%2$s', 'squelch-tabs-and-accordions-shortcodes' ),
                '<a href="https://squelchdesign.com/web-development/free-wordpress-plugins/squelch-tabs-and-accordions-shortcodes/" target="_blank">',
                '</a>'
            );

        }

        return $actions;

    }

}

new TabsAndAccordions();

