---
sidebar_position: 8
---

# `haccordions` shortcode

:::info

The `[haccordions]` shortcode (note: plural) tells **Squelch Tabs and Accordions** that you wish to create a block of horizontal accordions. It should not be confused with the `[haccordion]` shortcode (singular), which creates a single panel within the block.

:::

## Usage


```
[haccordions title="" title_header="h3" disabled="false" active="0" autoheight="false" collapsible="false"]
```

**Required parameters:**

* None.

## Required content

The `[haccordions]` shortcode requires at least one `[haccordion]` shortcode in order to be useful.

## Example

```
[haccordions]
[haccordion title="Is the building accessible?"]
We have a ramp for entering the ground floor…
[/haccordion]
[haccordion title="Will lunch be provided?"]
Lunch is not provided but there is an excellent canteen…
[/haccordion]
[/haccordions]
```

## Aliases

1. `[haccordions]`
1. `[subhaccordions]`
1. `[subsubhaccordions]`

## Parameters

### `title=""`

```
(text) The title shown above the horizontal accordion
Default: "" (empty string)
Requirement: Optional
```

Most of the time you probably won't need this, especially if you're using the plugin with a modern page builder.

**Accepted values:** any textual string. Remember though that WordPress does not allow shortcodes to be placed inside of parameters.

### `title_header="h3"`

```
(text) The element to render the title with. e.g. h4
Default: "h3"
Requirement: Optional
```

If you choose to use the `title=""` parameter to place a title above your haccordions then you can specify which level of heading it should be created as with the `title_header` parameter.

**Accepted values:**

* `h1`
* `h2`
* `h3`
* `h4`
* `h5`
* `h6`

### `width="960"`

```
(integer) Width of the haccordion in px
Default: 960
Requirement: Optional
```

This parameter is optional but you will almost certainly want to provide it. The horizontal accordion plugin is not (currently) responsive and uses a fixed width which you should specify with this parameter.

**Accepted values:**

* Any positive integer (i.e. whole number). Do not include "px" or any other unit length in the width.

### `height="320"`

```
(integer) Height of the haccordion in px
Default: 320
Requirement: Optional
```

This parameter is optional but you will almost certainly want to provide it. The horizontal accordion widget uses a fixed height which you should specify here.

**Accepted values:**

* Any positive integer (i.e. whole number). Do not include "px" or any other unit length in the height.

### `hwidth="28"`

```
(integer) Width of each header (vertical bars) in px
Default: 28 (jqueryui theme) or 48 (all other themes)
Requirement: Optional
```

The width of the vertical header bars is fixed. The default values are probably fine for most uses but if you want to customise the width of the headings you can do so with this parameter.

**Accepted values:**

* Any positive integer (i.e. whole number). Do not include "px" or any other unit length in the width.

### `activateon="click"`

```
(text) "click" or "mouseover": Which user input triggers opening of slides
Default: "click"
Requirement: Optional
```

The horizontal accordion library can use either "click", or "mouseover" as the trigger for changing between panels. Using "mouseover", however, is discouraged for usability and accessibility reasons.

**Accepted values:**

* `click` (recommended)
* `mouseover` (strongly discouraged)

### `active="0"`

```
(integer) Index of the active panel.
Default: 0
Requirement: Optional
```

Unlike accordions, horizontal accordions always have one panel open. By default this would be panel 0, the left-most panel. If you wish to have a different horizontal accordion panel open by default you can change the value of the `active` parameter. Horizontal accordion panels are numbered from left to right with 0 being the left-most panel, and increasing by 1 for each panel as you move right.

**Accepted values:**

* Any positive integer (i.e. whole number).

### `speed="800"`

```
(integer) Length of time in ms, duration the animation should last for
Default: 800
Requirement: Optional
```

Speed is, perhaps, a slight misnomer for this parameter as it is, in fact, a duration of time for the animation. So increasing the value will make the animation *slower* and decreasing the value will make the animation *faster*. The duration is measured in milliseconds (1 second = 1,000 milliseconds) so the default time of 800ms is eight tenths of a second.

**Accepted values:**

* Any positive integer (i.e. whole number).

### `autoplay="false"`

```
(boolean) Set to true to automatically scroll through panels
Default: false
Requirement: Optional
```

While **not** recommended, horizontal accordions can be set to automatically scroll through the available panels by enabling the `autoplay` parameter. The pause between each panel can be controlled with the `cyclespeed` parameter and the duration of the animation can be controlled with the `speed` parameter.

:::warning

Animation that occurs outside of a response to a user's actions creates an accessibility issue for certain groups of users. Therefore enabling this option may make your site non-compliant with accessibility guidelines, regulations, and laws, and may alienate or even repel some visitors to your website. Its use is therefore strongly discouraged.

:::

**Accepted values:**

* `true`
* `false`

### `pauseonhover="true"`

```
(boolean) If true the autoplay feature will be paused when the mouse is in the haccordion
Default: true
Requirement: Optional
```

When `autoplay` is set to true and `pauseonhover` is also set to true, the animations will stop if the user places their mouse over or inside of the horizontal accordion, allowing them to inspect the contents of the currently open panel. It's recommended that for usability reasons `pauseonhover` should always be set to `true` if `autoplay` is true.

:::info

`pauseonhover` *improves* the accessibility of horizontal accordions that have the `autoplay` feature enabled, but the `autoplay` feature remains inaccessible to certain groups of people even with `pauseonhover` enabled. `pauseonhover` only partially satisfies the "[Pause, Stop, Hide](https://www.w3.org/WAI/WCAG21/Understanding/pause-stop-hide.html)" recommendation of the WCAG guidelines. The gold standard is to never include unrequested animations on the page, and therefore all usage of `autoplay` is strongly discouraged.

:::

**Accepted values:**

* `true`
* `false`

### `cyclespeed="6000"`

```
(integer) Time between opening each slide (when autoplay is true)
Default: 6000
Requirement: Optional
```

When `autoplay` is set to `true`, `cyclespeed` specifies how long to wait, in milliseconds, between each panel.

**Accepted values:**

* Any positive integer (i.e. whole number).

### `theme="jqueryui"`

```
(text) One of: jqueryui, basic, dark, light or stitch
Default: "jqueryui"
Requirement: Optional
```

The horizontal accordions library (liteAccordion) has been modified to be able to use the jQuery UI theme you've selected in the plugin's settings, which is the default behaviour. If you'd prefer to use one of the liteAccordion themes then you can specify that here.

:::info

The liteAccordion themes don't really match with the jQuery UI themes, which is why the library was modified to allow you to use a jQuery UI theme instead.

:::

**Accepted values:**

* jqueryui
* basic
* dark
* light
* stitch

### `rounded="false"`

```
(boolean) Set to true to round the corners of the haccordion
Default: false
Requirement: Optional
```

Set to true if you want to round the corners of your horizontal accordion. This can also be controlled by [rolling your own jQuery UI theme](../advanced/styling/rolling-your-own-theme.md) or through [CSS](../advanced/styling/styling-horizontal-accordions.md).

**Accepted values:**

* `true`
* `false`

### `enumerate="false"`

```
(boolean) If true the slide number will be shown in each slide
Default: false
Requirement: Optional
```

A feature of the horizontal accordions library is that it can automatically number the headings of each panel in the horizontal accordion, but this is inconsistent with the jQuery UI based elements (accordions and tabs).

**Accepted values:**

* `true`
* `false`

