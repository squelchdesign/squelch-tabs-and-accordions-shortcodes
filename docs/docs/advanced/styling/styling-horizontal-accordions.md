---
sidebar_position: 6
---

# Styling horizontal accordions

**Squelch Tabs and Accordions** uses a modified version of liteAccordion for horizontal accordion functionality. liteAccordion comes with 4 themes by default, and the library has also been modified to allow the horizontal accordions to use the active jQuery UI theme, giving you a choice of 6 options for the `theme=` parameter:

* `jqueryui`: which tells the horizontal accordion to use the active jQuery UI theme's styles.
* `basic`
* `dark`
* `light`
* `stitch`

As usual the safest and easiest way to style the toggles is to [roll your own jQuery UI theme](./rolling-your-own-theme.md).

To style the horizontal accordions you can either override the relevant jQuery UI styles (the horizontal accordions use the accordion styles) or create a new liteAccordion theme and use the theme="yourtheme" attribute on the shortcode to tell the widget to use your new theme. To create your own liteAccordion theme it is recommended that you look in the relevant section of the file `<plugin directory>/css/squelch-tabs-and-accordions.css` for examples. However, the following styles should get you started.

:::warning

Do not attempt to use this information unless you have a solid grasp of HTML and CSS. This is an advanced topic aimed at developers.

:::

## Customising an existing theme

These selectors provide a basic starting point for you to begin writing your own custom CSS to override the provided styles:

```
.squelch-taas-haccordion {
    /* Styles relating to the container of your horizontal accordion */
}
.squelch-taas-haccordion .slide > h3 {
    /* Styles relating to the outermost section of the vertical bars */
}
.squelch-taas-haccordion .slide > h3 span {
    /* Styles relating to the innermost section of the vertical bars */
}
.squelch-taas-haccordion .slide > h3 b {
    /* Styles relating to the enumeration (if enabled) */
}
.squelch-taas-haccordion .slide > h3.selected {
    /* Styles relating to the outermost section of the currently open section's vertical bar */
}
.squelch-taas-haccordion .slide > h3.selected span {
    /* Styles relating to the innermost section of the currently open section's vertical bar */
}
.squelch-taas-haccordion .slide > h3.selected b {
    /* Styles relating to the enumeration (if enabled) of the currently open section's vertical bar */
}
.squelch-taas-haccordion .slide > div {
    /* Styles relating to the content areas of the horizontal accordion */
}
```

## Creating a custom `haccordions` theme

You can also create your own theme for the horizontal accordions element, which can be specified with the `theme=` parameter, simply by adding an extra class to your styles. As an example, below, we create an empty theme named "bluesky":

```
.squelch-taas-haccordion.bluesky {
    /* Styles relating to the container of your horizontal accordion */
}
.squelch-taas-haccordion.bluesky .slide > h3 {
    /* Styles relating to the outermost section of the vertical bars */
}
.squelch-taas-haccordion.bluesky .slide > h3 span {
    /* Styles relating to the innermost section of the vertical bars */
}
.squelch-taas-haccordion.bluesky .slide > h3 b {
    /* Styles relating to the enumeration (if enabled) */
}
.squelch-taas-haccordion.bluesky .slide > h3.selected {
    /* Styles relating to the outermost section of the currently open section's vertical bar */
}
.squelch-taas-haccordion.bluesky .slide > h3.selected span {
    /* Styles relating to the innermost section of the currently open section's vertical bar */
}
.squelch-taas-haccordion.bluesky .slide > h3.selected b {
    /* Styles relating to the enumeration (if enabled) of the currently open section's vertical bar */
}
.squelch-taas-haccordion.bluesky .slide > div {
    /* Styles relating to the content areas of the horizontal accordion */
}
```

You would then apply this theme like so:

```
[haccordions theme="bluesky"]
[haccordion title="Panel 0"]
Panel 0 content
[/haccordion]
[/haccordions]
```

This is more effort and less user friendly than [rolling your own theme](./rolling-your-own-theme.md), but allows multiple themes to be created and used by different horizontal accordions on the site.

