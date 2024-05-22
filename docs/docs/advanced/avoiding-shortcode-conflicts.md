---
sidebar_position: 2
---

# Avoiding shortcode conflicts

Some themes ship with shortcodes for creating tabs and accordions, and when they do it is likely that they will conflict with **Squelch Tabs and Accordions**. If this is the case then you can simply use the theme's built-in shortcodes. But if you'd prefer to use **Squelch Tabs and Accordions** in place of your theme's shortcodes, then you can use the relevant `[sub…` and `[subsub…` shortcodes (see "[Nesting elements](./nesting-elements.md)") in order to avoid a conflict.

Assume your theme proves the shortcodes `[tabs]` and `[tab]`. The following would not work as expected due to the conflict:

```
[tabs]
[tab title="This conflicts"]
This might conflict with a theme's built-in shortcodes.
[/tab]
[/tabs]
```

By replacing `[tabs]` with `[subtabs]` and `[tab]` with `[subtab]` we can prevent a conflict with the theme's built-in shortcodes:

```
[subtabs]
[subtab title="This should avoid a conflict"]
This should not conflict. Hurrah.
[/subtab]
[/subtabs]
```
