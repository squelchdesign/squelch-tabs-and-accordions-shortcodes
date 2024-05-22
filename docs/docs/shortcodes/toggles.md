---
sidebar_position: 6
---

# `toggles` shortcode

:::info

The `[toggles]` shortcode (note: plural) tells **Squelch Tabs and Accordions** that you wish to create a block of toggles. It should not be confused with the `[toggle]` shortcode (singular), which creates a single toggle section within the block.

:::

## Usage


```
[toggles title="" title_header="h3" speed="800" active="0,2" theme="jqueryui"]
```

**Required parameters:**

* None

## Required content

The `[toggles]` shortcode requires at least one `[toggle]` shortcode in order to be useful.

## Example

```
[toggles]
[toggle title="Feline"]
Felidae, a member of the cat family, which includes the subfamilies Pantherinae and Felinae.
[/toggle]
[toggle title="Canine"]
Animals of the family Canidae, more specifically the subfamily Caninae, which includes dogs, wolves, foxes, jackals and coyotes.
[/toggle]
[toggle title="Bovine"]
Bovines comprise a diverse group of 10 genera of medium to large-sized ungulates, including cattle, bison, African buffalo, water buffalos, and the four-horned and spiral-horned antelopes.
[/toggle]
[/toggles]
```

## Aliases

1. `[toggles]`
1. `[subtoggles]`
1. `[subsubtoggles]`

## Parameters

### `title=""`

```
(text) The title shown above the toggle group
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

If you choose to use the `title=""` parameter to place a title above your toggles then you can specify which level of heading it should be created as with the `title_header` parameter.

**Accepted values:**

* `h1`
* `h2`
* `h3`
* `h4`
* `h5`
* `h6`

### `speed="800"`

```
(integer) Length of time in ms, duration the animation should last for
Default: 800
Requirement: Optional
```

Speed is, perhaps, a slight misnomer for this parameter as it is, in fact, a duration of time for the animation. So increasing the value will make the animation *slower* and decreasing the value will make the animation *faster*. The duration is measured in milliseconds (1 second = 1,000 milliseconds) so the default time of 800ms is eight tenths of a second.

**Accepted values:**

* Any positive integer (i.e. whole number).

### `active="false"`

```
(integer(s), comma-separated|boolean) Which panel(s) of the toggle should be active on page load, comma-separated
Default: false (all panes collapsed)
Requirement: Optional
```

By default all individual toggle panes are closed to begin with, but if you wish to have one or more toggle panel open by default you can change the value of the `active` parameter. Toggle panels are numbered from top to bottom with 0 being the top-most panel, and increasing by 1 for each panel as you move downwards.

**Accepted values:**

* Any positive integer (i.e. whole number), or comma-separated integers to specify multiple panels.
* `false` to render the toggle with all panels closed.

### `theme="jqueryui"`

```
(string) The theme to apply to the toggle: blank, jqueryui, basic, dark, light, stitch.
Default: “jqueryui”
Requirement: Optional
```

**Squelch Tabs and Accordion's** toggles have been engineered to be able to use either a jQuery UI theme (which is what powers the tabs and accordions), or one of the themes from the **liteAccordion** library (which is what powers the horizontal accordions). You may therefore choose one of the liteAccordion themes — `blank`, `basic`, `dark`, `light`, or `stitch` — or `jqueryui` to use the currently selected jQuery UI theme that's in use for tabs and accordions.

**Accepted values:**

* `blank`
* `jqueryui`
* `basic`
* `dark`
* `light`
* `stitch`

### `style="jqueryui"` (deprecated)

```
(string) DEPRECATED: Alias for ‘theme’
```

:::danger[Deprecated]

Please use `theme=""` instead of `style=""`. This option was only ever provided for compatibility with another plugin which has long since stopped being supported, and is deprecated. It may be removed in a later version of **Squelch Tabs and Accordions**.

:::

