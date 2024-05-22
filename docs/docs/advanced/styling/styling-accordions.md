---
sidebar_position: 4
---

# Styling accordions

Note that the accordions are provided by jQuery UI and so it is necessary to override the jQuery UI styles to change their appearance. The safer and easier solution is to roll your own jQuery UI theme.

:::warning

Do not attempt to use this information unless you have a solid grasp of HTML and CSS. This is an advanced topic aimed at developers.

:::

These selectors provide a basic starting point for you to begin writing your own custom CSS to override the provided styles:

```
.squelch-taas-override.squelch-taas-accordion {
    /* Styles relating to the container of the tab group */
}
.squelch-taas-override.squelch-taas-accordion .ui-accordion-header {
    /* Styles relating to the titles of the panes */
}
.squelch-taas-override.squelch-taas-accordion .ui-accordion-active-header {
    /* Styles relating to the title of the open pane */
}
.squelch-taas-override.squelch-taas-accordion .ui-accordion-content {
    /* Styles relating to the contents of the accordion panes */
}
```

