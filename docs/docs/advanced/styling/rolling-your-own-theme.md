---
sidebar_position: 2
---

# Rolling your own theme

## Introduction

Rather than diving into CSS and styling your tabs, accordions, toggles and horizontal accordions through custom development, consider whether you can do most of, if not all of, what you want to achieve by rolling a custom jQuery UI theme instead. Rolling a theme is far quicker and simpler than hand writing CSS.

Rolling a custom theme involves a few steps:

1. Visit the [jQuery UI theme roller](https://jqueryui.com/themeroller/) website.
1. Create your own theme by customising the settings to suit your desired look and feel.
1. Download your custom jQuery UI theme as a zip file.
1. Extract the zip file and ensure the directory name is correct for the version of jQuery UI you are using (see below for more information on this).
1. Upload the extracted directory to your WordPress website's `wp-content/uploads/` directory using FTP, SCP or similar.
1. Select the custom theme in the **Tabs and Accordions** section of the WordPress customizer.

Read on for full instructions for each version of jQuery UI.

:::tip[Hint]

If you don't know which version of jQuery UI you are using, following the instructions for 1.13.2.

:::

## jQuery UI 1.13.2 (stable)

:::tip

This is the most recent supported version of jQuery UI that is available. It is **strongly recommended** that you use these instructions wherever possible. Instructions for older versions of jQuery UI are provided later in this document for users who need to use an older version.

:::


1. Head over to the [jQuery UI theme roller](https://jqueryui.com/themeroller/).
1. Select the colours, styles, etc that you want for your new theme.
1. Click the orange "Download theme" button.
1. On the "Download Builder" screen, choose version `1.13.2` from the available options. If you choose the wrong version your theme might not work correctly.
1. Leave all "Components" ticked.
1. At the bottom of the page ensure that "Custom Theme" is selected from the "Theme" dropdown.
1. Ensure that "CSS Scope" is left empty.
1. Click the "Download" button. Your new theme will download as a zip file.
1. Unzip your new theme into a directory named `jquery-ui-1.13.2.custom` (*it should be named this by default if you chose the correct options above*).
1. Upload this directory in its entirety into your `wp-content/uploads/` directory using FTP, SCP, or whatever service your hosting provider offers. Your theme should therefore end up at `wp-content/uploads/jquery-ui-1.13.2.custom/`.
1. Ensure your permissions are correct so that the directory is readable by your web server.
1. Once the theme is in place you can select it from the themes dropdown in the customizer where it will be named "Custom jQuery theme (jQuery 1.13.2)". See "Changing the theme" for instructions on how to change themes.

## jQuery UI 1.11.4 (legacy)

:::warning

For older versions of the **Squelch Tabs and Accordions** plugin you might need or prefer to use an older version of jQuery UI and, therefore, need to roll and older theme. But if you don't have a good reason to roll an older theme then please see the instructions above for the latest stable version of jQuery UI.

:::

1. Head over to the [jQuery UI theme roller](https://jqueryui.com/themeroller/).
1. Select the colours, styles, etc that you want for your new theme.
1. Click the orange "Download theme" button.
1. On the "Download Builder" screen, choose version `1.11.4` from the available options. If you choose the wrong version your theme might not work correctly.
1. Leave all "Components" ticked.
1. At the bottom of the page ensure that "Custom Theme" is selected from the "Theme" dropdown.
1. Ensure that "CSS Scope" is left empty.
1. Click the "Download" button. Your new theme will download.
1. Unzip your new theme into a directory named `jquery-ui-1.11.4.custom` (it should be named this by default if you chose the correct options above).
1. Upload this directory in its entirety into your `wp-content/uploads/` directory using FTP, SCP, or whatever service your hosting provider offers. Your theme should therefore end up at `wp-content/uploads/jquery-ui-1.11.4.custom/`.
1. Ensure your permissions are correct so that the directory is readable by your web server.
1. Once the theme is in place you can select it from the themes dropdown in the customizer where it will be named "Custom jQuery theme (jQuery 1.11.4)". See "Changing the theme" for instructions on how to change themes.


## jQuery UI 1.9.2 (deprecated)

:::danger[DEPRECATED]

Using a jQuery UI 1.9.2 theme is deprecated and it's strongly recommended that you use a newer version.

:::

1. Head over to the [jQuery UI theme roller](https://jqueryui.com/themeroller/).
1. Select the colours, styles, etc that you want for your new theme.
1. Click the orange "Download theme" button.
1. On the "Download Builder" screen, choose version `1.9.2` from the available options. If you choose the wrong version your theme will NOT work correctly.
1. Leave all "Components" ticked.
1. At the bottom of the page ensure that "Custom Theme" is selected from the "Theme" dropdown.
1. Ensure that "CSS Scope" is left empty.
1. Click the "Download" button. Your new theme will download.
1. Unzip your new theme into a directory named `jquery-ui-1.9.2.custom` (it should be named this by default if you chose the correct options above).
1. Upload this directory in its entirety into your `wp-content/uploads/` directory using FTP, SCP, or whatever service your hosting provider offers. Your theme should therefore end up at `wp-content/uploads/jquery-ui-1.9.2.custom/`.
1. Ensure your permissions are correct so that the directory is readable by your web server.
1. Once the theme is in place you can navigate to the Squelch Tabs and Accordions Shortcodes admin options screen. The "Themes" dropdown will now have a new option available: "Custom jQuery theme (jQuery 1.9.2)". Select this option to enable the new theme.
1. Once the theme is in place you can select it from the themes dropdown in the customizer where it will be named "Custom jQuery theme (jQuery 1.9.2)". See "Changing the theme" for instructions on how to change themes.

