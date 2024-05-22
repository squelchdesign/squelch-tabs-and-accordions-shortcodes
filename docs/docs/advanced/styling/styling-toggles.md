---
sidebar_position: 5
---

# Styling toggles

As jQuery UI does not provide a toggle widget, **Squelch Tabs and Accordions** uses its own custom built jQuery plugin for this functionality. Toggles have been built from the ground up to be compatible with both jQuery UI themes *and* liteAccordion themes (the library that powers the horizontal accordions). This means that your website's toggles can be styled by your jQuery UI theme *or* by using a liteAccordion theme, giving you a choice of 6 options for the `theme=` parameter:

* `jqueryui`: which tells the toggle to use the active jQuery UI theme's styles.
* `blank`: a very basic stripped-down theme for you to extend for your own purposes.
* `basic`
* `dark`
* `light`
* `stitch`

You can choose which theme to use with the `theme=` parameter, e.g.

```
[toggles theme="jqueryui"]
```

As usual the safest and easiest way to style the toggles is to roll your own jQuery UI theme.

:::warning

Do not attempt to use this information unless you have a solid grasp of HTML and CSS. This is an advanced topic aimed at developers.

:::

## Customising an existing theme

These selectors provide a basic starting point for you to begin writing your own custom CSS to override the provided styles:

```
.squelch-taas-toggle {
    /* Styles relating to the container of the toggle group */
}
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header {
    /* Styles relating to the horizontal headings */
}
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header-active {
    /* Styles relating to currently active (open) headings */
}
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header-hover {
    /* Styles relating to the currently hovered over heading */
}
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header a,
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header a:link,
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header a:visited,
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header a:active,
.squelch-taas-toggle .squelch-taas-toggle-shortcode-header a:hover {
    /* Styles related to the links in the headings */
}
.squelch-taas-toggle .squelch-taas-toggle-shortcode-content {
    /* Styles related to the content areas of the toggles */
}
```

## Creating a custom `toggles` theme

You can also create your own theme for the toggle, which can be specified with the `theme=` parameter, simply by adding an extra class to your styles. As an example, below, we create an empty theme named "garden":

```
.squelch-taas-toggle.garden {
    /* Styles relating to the container of the toggle group */
}
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header {
    /* Styles relating to the horizontal headings */
}
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header-active {
    /* Styles relating to currently active (open) headings */
}
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header-hover {
    /* Styles relating to the currently hovered over heading */
}
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header a,
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header a:link,
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header a:visited,
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header a:active,
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-header a:hover {
    /* Styles related to the links in the headings */
}
.squelch-taas-toggle.garden .squelch-taas-toggle-shortcode-content {
    /* Styles related to the content areas of the toggles */
}
```

You would then apply this theme like so:

```
[toggles theme="garden"]
[toggle title="Panel 0"]
Panel 0 content
[/toggle]
[/toggles]
```

This is more effort and less user friendly than rolling your own theme, but allows multiple themes to be created and used by different toggles on the site.

