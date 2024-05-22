---
sidebar_position: 2
---

# Basic usage

## Example 1: three simple tabs

```
[tabs title="" disabled="false" collapsible="false" active="0" event="click"]
[tab title="Tab 0"]Tab 0 content[/tab]
[tab title="Tab 1"]Tab 1 content[/tab]
[tab title="Tab 2"]Tab 2 content[/tab]
[/tabs]
```

**This example will create a very simple tabbed area with three tabs named "Tab 0", "Tab 1", and "Tab 2".**

:::tip[Tip]

You don't need to specify all of the parameters shown above, they're just included to show what's available. See the complete Shortcodes documentation for a full explanation of what is and is not required.

:::

* Changing `title=""` will add a title before the tabbed area. The element used to render the title can be adjusted with (e.g.) `title_header="h6"`.
* Usually you won't want to disable your tabbed area, locking it to the currently open tab and preventing any interaction, but the option is available by setting `disabled="true"`.
* Tabs can be allowed to collapse to save additional space on the page, somewhat similar to an accordion. This is an unusual use case, however, and I wouldn't necessarily recommend it. If you wish to enable this behaviour set `collapsible="true"`.
* Which tab is open by default can be customised by changing the `active="0"` attribute to the number of the tab that should be open. Numbering always starts at 0 and increments by 1 as you move from left to right across the tabs.
* It's also possible to change the event that causes tabs to switch. You probably want to leave this as **click**, but you could change this to `mouseover` if you wanted the tabs to change without being clicked. This, again, is an unusual behaviour so I would only recommend doing this if you have a good reason to do so.

## Example 2: three simple accordions

```php
[accordions title="" disabled="false" active="0" autoheight="false" collapsible="false"]
[accordion title="Pane 0"]Accordion panel 0 content[/accordion]
[accordion title="Pane 1"]Accordion panel 1 content[/accordion]
[accordion title="Pane 2"]Accordion panel 2 content[/accordion]
[/accordions]
```

**Creates three accordions on the page, with sections named "Pane 0", "Pane 1", and "Pane 2".**

:::tip[Tip]

You don't need to specify all of the parameters shown above, they're just included to show what's available. See the complete Shortcodes documentation for a full explanation of what is and is not required.

:::

* Changing `title=""` will add a title before the accordion section. The element used to render the title can be adjusted with (e.g.) `title_header="h6"`.
* Usually you won't want to disable your accordions, locking it to the currently open panel and preventing any interaction, but the option is available by setting `disabled="true"`.
* Which panel is open by default can be customised by changing the `active="0"` attribute to the number of the panel that should be open. Numbering always starts at 0 and increments by 1 as you move from top to bottom. The default is for the accordion to start with all panels closed.
* Each accordion panel is only as tall as its content by default. If you have very different lengths of content in each panel then this may cause confusing behaviour. Setting `autoheight="true"` each panel will be set to the same height, using the height of the tallest accordion panel.
* By default one panel is always open on an accordion. You can allow the panel to be closed by clicking its title by enabling `collapsible="true"`.

## Example 3: three simple toggles

:::note[How do Toggles differ from Accordions?]

Toggles render like accordions, but multiple panels can be opened at the same time, or they can all be closed. Toggles are particularly well suited to FAQ sections.

:::

```
[toggles title="" speed="800" active="0,2" theme="jqueryui"]
[toggle title="Pane 0"]Toggle panel 0 content[/toggle]
[toggle title="Pane 1"]Toggle panel 1 content[/toggle]
[toggle title="Pane 2"]Toggle panel 2 content[/toggle]
[/toggles]
```

**Creates three toggles on the page, with sections named "Pane 0", "Pane 1", and "Pane 2".**

:::tip[Tip]

You don't need to specify all of the parameters shown above, they're just included to show what's available. See the complete Shortcodes documentation for a full explanation of what is and is not required.

:::

* Changing `title=""` will add a title before the accordion section. The element used to render the title can be adjusted with (e.g.) `title_header="h6"`.
* How fast the panels animate can be adjusted with the `speed="800"` attribute. The number is the number of milliseconds (ms) the animation should take.
* Which panes are open by default can be customised by changing the `active="0,2"` attribute to the number(s) of the panel that should be open, separated by commas. Numbering always starts at 0 and increments by 1 as you move from top to bottom.
* Toggles can use the active jQuery UI theme (which is the default behaviour) but they can also use the same themes used by the horizontal accordions: `basic`, `dark`, `light`, `stitch`. They can also be set to use the `blank` theme which allows the developer the option of specifying their own styles for the toggles in CSS.

## Example 4: a basic horizontal accordion

:::warning[Take note]

Please note that horizontal accordions are NOT (yet) responsive. A full rewrite of the horizontal accordion library is planned for the near future to address this.

:::

```
[haccordions title="" width="300" height="150" hwidth="28" activateon="click" active="0" speed="800" autoplay="false" pauseonhover="true" cyclespeed="6000" theme="jqueryui" rounded="false" enumerate="false"]
[haccordion title="Pane 0"]Accordion panel 0 content[/haccordion]
[haccordion title="Pane 1"]Accordion panel 1 content[/haccordion]
[haccordion title="Pane 2"]Accordion panel 2 content[/haccordion]
[/haccordions]
```

**Adds a simple horizontal accordion to the page which uses the default jQuery UI theme selected in the plugin settings. The horizontal accordion will have three panels named "Pane 0", "Pane 1", and "Pane 2".**

:::tip[Tip]

You don't need to specify all of the parameters shown above, they're just included to show what's available. See the complete Shortcodes documentation for a full explanation of what is and is not required.

:::

* Because horizontal accordions are not (yet) responsive they require a width which is specified here in pixels with the `width="300"` attribute.
* Likewise a height needs to be specified in pixels using the `height="150"` attribute.
* The width of each bar is specified in pixels with the `hwidth="28"` attribute.
* `activeon="click"` tells the horizontal accordion library which mouse event to listen for: `click` or `mouseover`. We would typically recommend using `click` unless you have a good reason to use `mouseover`.
* Which panel is open by default can be customised by changing the `active="0"` attribute to the number of the panel that should be open. Numbering always starts at 0 and increments by 1 as you move from left to right.
* How fast the panels animate can be adjusted with the `speed="800"` attribute. The number is the number of milliseconds (ms) the animation should take.
* Setting `autoplay="true"` will cause the horizontal accordion panels to automatically open without being clicked, for example to showcase a series of pictures. `cyclespeed="6000"` specifies the time in milliseconds (ms) to wait before opening the next panel. Note: 1000 milliseconds = 1 second. It's recommended, if you set `autoplay="true"` that you also set `pauseonhover="true"` to allow the user to interact with the horizontal accordion. With this setting enabled the animation will stop if the mouse cursor is over the horizontal accordion.
* Horizontal accordions use a different library to the accordions and tabs, and it ships with its own themes. We have customised the library to allow it to use the jQuery UI theme you have chosen and this is set as the default for horizontal accordions. Other themes you can set with `theme="…"` include `basic`, `dark`, `light`, and `stitch`.
* Set `rounded="true"` if you want a more rounded appearance. Set `enumerate="true"` if you want each panel to be numbered in the horizontal accordion.

