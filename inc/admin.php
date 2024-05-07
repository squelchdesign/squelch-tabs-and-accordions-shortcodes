<?php

// Security
if (!isset($squelch_taas_admin) || !$squelch_taas_admin) die(_e( 'No direct access', 'squelch-tabs-and-accordions-shortcodes' ));
if (!current_user_can( 'manage_options' )) exit;

$theme = get_option( 'squelch_taas_jquery_ui_theme' );
$vanity_url = get_option( 'squelch_taas_vanity_url' );
if ($vanity_url === false) $vanity_url = 'squelch-taas-';
$vanity_url = trim( $vanity_url );
if ( empty($vanity_url) ) $vanity_url = 'squelch-taas-';

$disable_magic_url = get_option( 'squelch_taas_disable_magic_url' );


/* Save changes
 */
if ( isset( $_POST['staas-admin'] ) ) {

    if ( wp_verify_nonce( $_POST['staas-admin'] ?? '', 'staas-admin-save' ) ) {
        $valid = true;

        $new_theme      = $_POST['jquery_ui_theme'];
        $new_vanity_url = $_POST['vanity_url'];
        if ($new_vanity_url === false) $new_vanity_url = 'squelch-taas-';
        $new_vanity_url = trim( $new_vanity_url );
        if ( empty($new_vanity_url) ) $new_vanity_url = 'squelch-taas-';

        $new_disable_magic_url = $_POST['disable_magic_url'] ?? '' && true;

        if ($valid) {
            update_option( 'squelch_taas_jquery_ui_theme',   $new_theme             );
            update_option( 'squelch_taas_vanity_url',        $new_vanity_url        );
            update_option( 'squelch_taas_disable_magic_url', $new_disable_magic_url );

            $msg  = isset($GLOBALS['squelch_taas_admin_msg']) ? $GLOBALS['squelch_taas_admin_msg'] : '';
            $msg .= '<div class="updated"><p>'.__('Changes saved.', 'squelch-tabs-and-accordions-shortcodes').'</p></div>';
            $GLOBALS['squelch_taas_admin_msg'] = $msg;

            $theme = $new_theme;
            $vanity_url = $new_vanity_url;
            $disable_magic_url = $new_disable_magic_url;
        }

    } else {
        wp_die( __( "Sorry, you are not allowed to access this page.", 'squelch-tabs-and-accordions-shortcodes' ) );
    }

}


// Detect whether a custom theme has been uploaded or not:

$upload_dir = wp_upload_dir();
$upload_dir = $upload_dir['basedir'];

$custom_theme_dir = trailingslashit( $upload_dir ) . 'jquery-ui-1.9.2.custom';
$custom_theme_detected = false;
if (file_exists( $custom_theme_dir )) $custom_theme_detected = true;

$custom_theme_dir = trailingslashit( $upload_dir ) . 'jquery-ui-1.11.4.custom';
$custom_theme_1_11_4_detected = false;
if (file_exists( $custom_theme_dir )) $custom_theme_1_11_4_detected = true;

$custom_theme_dir = trailingslashit( $upload_dir ) . 'jquery-ui-1.12.1.custom';
$custom_theme_1_12_1_detected = false;
if (file_exists( $custom_theme_dir )) $custom_theme_1_12_1_detected = true;

$custom_theme_dir = trailingslashit( $upload_dir ) . 'jquery-ui-1.13.2.custom';
$custom_theme_1_13_2_detected = false;
if (file_exists( $custom_theme_dir )) $custom_theme_1_13_2_detected = true;



global $squelch_taas_admin_msg;
$custom_css = get_option('squelch_taas_custom_css_url');

?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.advanced-option').hide();
    });
</script>
<div class="wrap">
    <?php echo $squelch_taas_admin_msg; ?>

    <h2><?php _e('Squelch Tabs And Accordions Shortcodes', 'squelch-tabs-and-accordions-shortcodes'); ?></h2>
    <p>
        <?php
            _e( 'Squelch Tabs and Accordions Shortcodes provides shortcodes for adding vertical accordions, horizontal accordions, tabs, and toggles to your WordPress website.', 'squelch-tabs-and-accordions-shortcodes' );
        ?>
    </p>
    <a href="http://squelchdesign.com/web-development/free-wordpress-plugins/squelch-tabs-and-accordions-shortcodes/" target="_blank" class="button"><?php _e( 'Theme Documentation', 'squelch-tabs-and-accordions-shortcodes' ); ?></a>
    <a href="https://wordpress.org/support/topic/please-read-this-before-you-post-5?replies=2" target="_blank" class="button"><?php _e( 'Support Forum', 'squelch-tabs-and-accordions-shortcodes' ); ?></a>
    <a href="https://wordpress.org/plugins/squelch-tabs-and-accordions-shortcodes/" target="_blank" class="button"><?php _e( 'Rate on WordPress.org', 'squelch-tabs-and-accordions-shortcodes' ); ?></a>
    <a href="http://squelchdesign.com/uncategorized/roll-theme-squelch-tabs-accordions-shortcodes-plugin/" target="_blank" class="button"><?php _e(' How to create a custom theme', 'squelch-tabs-and-accordions-shortcodes' ); ?></a>
    <form method="post" action="">
        <?php wp_nonce_field( 'staas-admin-save', 'staas-admin', true ); ?>
        <div>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">
                            <label for="jquery_ui_theme">
                                <?php
                                    /* translators: Please note that "jQuery UI" is the correct capitalisation */
                                    _e( 'jQuery UI theme', 'squelch-tabs-and-accordions-shortcodes' );
                                ?>
                            </label>
                        </th>
                        <td valign="top">
                            <select id="jquery_ui_theme" name="jquery_ui_theme">
                                <option<?php selected($theme, 'none'); ?> value="none"><?php _e( 'No jQuery UI theme', 'squelch-tabs-and-accordions-shortcodes' ); ?></option>
                                <!-- option <?php /*selected($theme, 'custom');*/ ?> value="custom">Use your own custom CSS</option -->
                                <option<?php selected($theme, 'base'); ?> value="base"><?php _e( 'jQuery UI Base Styles Only', 'squelch-tabs-and-accordions-shortcodes' ); ?></option>
                                <?php if ($custom_theme_detected) : ?>
                                    <option<?php selected($theme, 'custom'); ?> value="custom"><?php
                                        /* translators: Version number in the string is intentional. It may be translated as long as its meaning is not changed */
                                        _e( 'Custom jQuery UI theme (1.9.2)', 'squelch-tabs-and-accordions-shortcodes' );
                                    ?></option>
                                <?php endif; ?>
                                <?php if ($custom_theme_1_11_4_detected) : ?>
                                    <option<?php selected($theme, 'custom1114'); ?> value="custom1114"><?php
                                        /* translators: Version number in the string is intentional. It may be translated as long as its meaning is not changed */
                                        _e( 'Custom jQuery UI theme (1.11.4)', 'squelch-tabs-and-accordions-shortcodes' );
                                    ?></option>
                                <?php endif; ?>
                                <?php if ($custom_theme_1_12_1_detected) : ?>
                                    <option<?php selected($theme, 'custom1121'); ?> value="custom1121"><?php
                                        /* translators: Version number in the string is intentional. It may be translated as long as its meaning is not changed */
                                        _e( 'Custom jQuery UI theme (1.12.1)', 'squelch-tabs-and-accordions-shortcodes' );
                                    ?></option>
                                <?php endif; ?>
                                <?php if ($custom_theme_1_13_2_detected) : ?>
                                    <option<?php selected($theme, 'custom1132'); ?> value="custom1132"><?php
                                        /* translators: Version number in the string is intentional. It may be translated as long as its meaning is not changed */
                                        _e( 'Custom jQuery UI theme (1.13.2)', 'squelch-tabs-and-accordions-shortcodes' );
                                    ?></option>
                                <?php endif; ?>
                                <option<?php selected($theme, 'black-tie'); ?> value="black-tie"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Black tie" is, I assume, based on the formal dress code of the same name */
                                    _e( 'Black Tie', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'blitzer'); ?> value="blitzer"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Blitzer" is, I assume, based on the name of one of Santa's reindeer */
                                    _e( 'Blitzer', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'cupertino'); ?> value="cupertino"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Cupertino" is, I assume, hinting at Apple's look and feel */
                                    _e( 'Cupertino', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'dark-hive'); ?> value="dark-hive"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Black Hive" is a dark theme with a honeycomb texture */
                                    _e( 'Dark Hive', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'dot-luv'); ?> value="dot-luv"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Dot Luv" is a black and blue theme with a dotted texture */
                                    _e( 'Dot Luv', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'eggplant'); ?> value="eggplant"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Eggplant" is an aubergine coloured theme */
                                    _e( 'Eggplant', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'excite-bike'); ?> value="excite-bike"><?php
                                    /* translators: This is the name of a jQuery UI theme based on the classic Nintendo game of the same name */
                                    _e( 'Excite Bike', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'flick'); ?> value="flick"><?php
                                    /* translators: This is the name of a jQuery UI theme which is clearly based on the Flickr colours */
                                    _e( 'Flick', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'hot-sneaks'); ?> value="hot-sneaks"><?php
                                    /* translators: This is the name of a jQuery UI theme. I *think* its name refers to classically styled American sneakers (trainers) */
                                    _e( 'Hot Sneaks', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'humanity'); ?> value="humanity"><?php
                                    /* translators: This is the name of a jQuery UI theme. I *think* it's based on the Ubuntu brand colours */
                                    _e( 'Humanity', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'le-frog'); ?> value="le-frog"><?php
                                    /* translators: This is the name of a bright green jQuery UI theme */
                                    _e( 'Le Frog', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'mint-choc'); ?> value="mint-choc"><?php
                                    /* translators: This is the name of a jQuery UI theme in black and green */
                                    _e( 'Mint Choc', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'overcast'); ?> value="overcast"><?php
                                    /* translators: This is the name of a very grey jQuery UI theme */
                                    _e( 'Overcast', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'pepper-grinder'); ?> value="pepper-grinder"><?php
                                    /* translators: This is the name of a jQuery UI theme in textured greys and pale yellows */
                                    _e( 'Pepper Grinder', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'redmond'); ?> value="redmond"><?php
                                    /* translators: This is the name of a jQuery UI theme. "Redmond" is, I assume, hinting at Microsoft's look and feel */
                                    _e( 'Redmond', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'smoothness'); ?> value="smoothness"><?php
                                    /* translators: This is the name of a smooth jQuery UI theme. I've no idea how you would translate the "ness" into another language! */
                                    _e( 'Smoothness', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'south-street'); ?> value="south-street"><?php
                                    /* translators: This is the name of a jQuery UI theme. I've no idea what it refers to. It's very green and yellow? */
                                    _e( 'South Street', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'start'); ?> value="start"><?php
                                    /* translators: This is the name of a jQuery UI theme that is very clearly based on the Windows XP style (jQuery UI is OLD) */
                                    _e( 'Start', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'sunny'); ?> value="sunny"><?php
                                    /* translators: This is the name of a yellow jQuery UI theme */
                                    _e( 'Sunny', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'swanky-purse'); ?> value="swanky-purse"><?php
                                    /* translators: This is the name of a jQuery UI theme based on the style of high end fashion purses and handbags */
                                    _e( 'Swanky Purse', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'trontastic'); ?> value="trontastic"><?php
                                    /* translators: This is the name of a jQuery UI theme that appears to be based on the style of the Tron films */
                                    _e( 'Trontastic', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'ui-darkness'); ?> value="ui-darkness"><?php
                                    /* translators: This is the name of a dark jQuery UI theme */
                                    _e( 'Darkness', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'ui-lightness'); ?> value="ui-lightness"><?php
                                    /* translators: This is the name of a light jQuery UI theme */
                                    _e( 'Lightness', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                                <option<?php selected($theme, 'vader'); ?> value="vader"><?php
                                    /* translators: This is the name of a jQuery UI theme that is clearly based on the (dark side) of the Star Wars films */
                                    _e( 'Vader', 'squelch-tabs-and-accordions-shortcodes' );
                                ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="show_advanced_options">
                                <?php _e( 'Show advanced options', 'squelch-tabs-and-accordions-shortcodes' ); ?>
                            </label>
                        </th>
                        <td valign="top">
                            <input
                                type="button"
                                name="show_advanced_options"
                                id="show_advanced_options"
                                onclick="jQuery('.advanced-option').toggle('fast');"
                                value="<?php _e( 'Show advanced options', 'squelch-tabs-and-accordions-shortcodes' ); ?>"
                            />
                        </td>
                    </tr>
                    <tr valign="top" class="advanced-option">
                        <th scope="row">
                            <label for="vanity_url">
                                <?php _e( 'Disable magic URLs', 'squelch-tabs-and-accordions-shortcodes' ); ?>
                            </label>
                        </th>
                        <td valign="top">
                            <input type="checkbox" name="disable_magic_url" id="disable_magic_url"<?php checked( $disable_magic_url ); ?> />
                            <br />
                            <em>
                                <?php
                                    printf(
                                        __(
                                            /* translators: 1: An arbitrary short string chosen by the user, or the default of squelch-taas-tab-content-0-1 */
                                            'When clicking a widget generated by this plugin the URL will be appended with something like %1$s ... We call these "Magic URLs". You can disable this feature by ticking the box above.',
                                            'squelch-tabs-and-accordions-shortcodes'
                                        ),
                                        "#" . esc_html( $vanity_url) . "tab-content-0-1"
                                    );
                                ?>
                            </em>
                            <?php if ($disable_magic_url) : ?>
                                <p>
                                    <?php
                                        _e(
                                            'Magic URLs are currently <strong>disabled</strong> (untick the box above if you wish to enable them). Clicking a tab or an accordion will NOT modify the page\'s URL.',
                                            'squelch-tabs-and-accordions-shortcodes'
                                        );
                                    ?>
                                </p>
                            <?php else : ?>
                                <p>
                                    <?php
                                        _e(
                                            'Magic URLs are currently <strong>enabled</strong> (tick the box above if you wish to disable them). Clicking a tab or an accordion will modify the page\'s URL.',
                                            'squelch-tabs-and-accordions-shortcodes'
                                        );
                                    ?>
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top" class="advanced-option">
                        <th scope="row">
                            <label for="vanity_url">
                                <?php
                                    /* translators: "Vanity URL prefix" is an arbitrary string the user can change, the default being squelch-taas-. This string is added to the URL when selecting a tab or accordion to view */
                                    _e(
                                        'Vanity URL prefix',
                                        'squelch-tabs-and-accordions-shortcodes'
                                    );
                                ?>
                            </label>
                        </th>
                        <td valign="top">
                            <input type="text" name="vanity_url" id="vanity_url" value="<?php echo esc_attr( $vanity_url ); ?>" />
                            <br />
                            <em>
                                <?php
                                    printf(
                                        __(
                                            /* translators: 1: An arbitrary short string chosen by the user, or the default of squelch-taas-tab-content-0-1 */
                                            'Magic URLs generated by the widgets look like: %1$s ... You can change the first part of that by entering a value here. If you choose to change this value then any existing links to specific tabs/accordions may stop working. If you do not understand what this setting does then leave it as default. To restore the default value leave this box empty and save changes.',
                                            'squelch-tabs-and-accordions-shortcodes'
                                        ),
                                        "#" . esc_html( $vanity_url) . "tab-content-0-1"
                                    );
                                ?>
                            </em>
                            <p>
                                <?php
                                    printf(
                                        __(
                                            /* translators: 1: The URL of the current website with an arbitrary special string appended to the end */
                                            'Links to tabs will look something like: %1$s',
                                            'squelch-tabs-and-accordions-shortcodes'
                                        ),
                                        get_option('siteurl') . '/#' . esc_html( $vanity_url ) . 'tab-content-0-1'
                                    );
                                ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="hidden" name="submitted" value="1" />
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'squelch-tabs-and-accordions-shortcodes' ); ?>" />
            </p>
        </div>
    </form>
</div>
