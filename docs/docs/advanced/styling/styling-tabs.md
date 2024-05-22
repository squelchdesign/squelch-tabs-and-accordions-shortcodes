---
sidebar_position: 3
---

# Styling tabs

Note that the tabs are provided by jQuery UI and so it is necessary to override the jQuery UI styles to change their appearance. The safer and easier solution is to [roll your own jQuery UI theme](./rolling-your-own-theme.md).

:::warning

Do not attempt to use this information unless you have a solid grasp of HTML and CSS. This is an advanced topic aimed at developers.

:::

These selectors provide a basic starting point for you to begin writing your own custom CSS to override the provided styles:

```
.squelch-taas-override.squelch-taas-tab-group.ui-widget-content {
    /* Styles relating to the container of the tab group */
}
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-tabs-nav {
    /* Styles relating to the tab bar */
}
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-tabs-nav li {
    /* Styles relating to individual tab buttons in the tab bar */
}
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-tabs-nav li.ui-tabs-active {
    /* Styles relating to the button of the currently open tab */
}
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-state-active a,
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-state-active a:link,
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-state-active a:visited {
    /* Styles relating to the text of the active button */
}
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-state-default a,
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-state-default a:link,
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-state-default a:visited {
    /* Styles relating to the text of the other (inactive) buttons */
}
.squelch-taas-override.squelch-taas-tab-group.ui-tabs .ui-tabs-panel {
    /* Styles relating to the panel of the tabs (ie where the tab content is) */
}
```

