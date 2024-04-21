---
sidebar_position: 4
---

# `accordions` shortcode

:::info

The `[accordions]` shortcode (note: plural) tells **Squelch Tabs and Accordions** that you wish to create a block of accordions. It should not be confused with the `[accordion]` shortcode (singular), which creates a single accordion section within the block.

:::

## Usage


```
[accordions title="" title_header="h3" disabled="false" active="0" autoheight="false" collapsible="false"]
```

**Required parameters:**

* None.

## Required content

The `[accordions]` shortcode requires at least one `[accordion]` shortcode in order to be useful.

## Example

```
[accordions]
[accordion title="Is the building accessible?"]
We have a ramp for entering the ground floor…
[/accordion]
[accordion title="Will lunch be provided?"]
Lunch is not provided but there is an excellent canteen…
[/accordion]
[/accordions]
```

## Aliases

1. `[accordions]`
1. `[subaccordions]`
1. `[subsubaccordions]`

## Parameters

### `title=""`

```
(text) The title shown above the accordion group
Default: “” (empty string)
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

If you choose to use the `title=""` parameter to place a title above your accordions then you can specify which level of heading it should be created as with the `title_header` parameter.

**Accepted values:**

* `h1`
* `h2`
* `h3`
* `h4`
* `h5`
* `h6`

### `disabled="false"`

```
(boolean) Disables or enables the accordion
Default: false
Requirement: Optional
```

Most users probably won't ever need this option, but it might have its uses. Setting `disabled="true"` will render your accordions as usual, but your visitors won't be able to switch panes.

**Accepted values:**

* `true`
* `false`

### `active="false"`

```
(integer|boolean) Index of the active pane. Set to false to collapse all panes on page load
Default: false
Requirement: Optional
```

By default all individual accordion panes are closed to begin with, but if you wish to have an accordion panel open by default you can change the value of the `active` parameter. Accordion panels are numbered from top to bottom with 0 being the top-most panel, and increasing by 1 for each panel as you move downwards.

**Accepted values:**

* Any positive integer (i.e. whole number).
* `false` to render the accordion with all panels closed.

### `autoheight="false"`

```
(boolean) Makes all panes the same height, based on the longest pane, to make animations smoother
Default: false
Requirement: Optional
```

Each accordion panel is only as tall as its content by default. If you have very different lengths of content in each panel then this may cause confusing behaviour. Setting `autoheight="true"` each panel will be set to the same height, using the height of the tallest accordion panel.

**Accepted values:**

* `true`
* `false`

### `collapsible="false"`

```
(boolean) Whether all panes can be closed at once
Default: true
Requirement: Optional
```

By default one panel is always open on an accordion. You can allow the panel to be closed by clicking its title by enabling `collapsible="true"`.

**Accepted values:**

* `true`
* `false`

