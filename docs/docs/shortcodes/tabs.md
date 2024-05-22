---
sidebar_position: 1
---

# `tabs` shortcode

:::info

The `[tabs]` shortcode (note: plural) tells **Squelch Tabs and Accordions** that you wish to create a block of tabs. It should not be confused with the `[tab]` shortcode (singular), which creates a single tab within the block.

:::

## Usage

```
[tabs title="" title_header="h3" disabled="false" collapsible="false" active="0" event="click"]
```

**Required parameters:**

* None

## Required content

The `[tabs]` shortcode requires at least one `[tab]` shortcode in order to be useful.

## Example

```
[tabs]
[tab title="The first tab"]
This is the first tab.
[/tab]
[tab title="Second tab"]
This is the second tab.
[/tab]
[/tabs]
```

## Aliases

1. `[tabs]` — top-level tabs shortcode
1. `[subtabs]` — for embedding tabs inside of tabs (see [Nesting elements](../advanced/nesting-elements.md))
1. `[subsubtabs]` — for embedding tabs inside of tabs (see [Nesting elements](../advanced/nesting-elements.md))

## Parameters

### `title=""`

```
(text) The title shown above the tab group
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

If you choose to use the `title=""` parameter to place a title above your tabs then you can specify which level of heading it should be created as with the `title_header` parameter.

**Accepted values:**

* `h1`
* `h2`
* `h3`
* `h4`
* `h5`
* `h6`

### `disabled="false"`

```
(boolean) If true the tabs will be disabled
Default: false
Requirement: Optional
```

Most users probably won't ever need this option, but it might have its uses. Setting `disabled="true"` will render your tabs as usual, but your visitors won't be able to switch tabs.

**Accepted values:**

* `true`
* `false`

### `collapsible="false"`

```
(boolean) If true, clicking the active tab will collapse the content into the tab bar similar to an accordion
Default: false
Requirement: Optional
```

Normally, with tabbed content, the content associated with the active tab is always visible. That is to say it's not usually possible to "close" the tabs as one is always visible. This is the normal and accepted behavior of tabs. You may, however, allow your tabs to be collapsed into just a tab bar by enabling `collapsible="true"`. With this parameter active, clicking the tab that is currently open will cause the content to be hidden leaving only the tab bar visible. Clicking it once again will cause it to reappear. This is a non-standard behavior, and so it's not enabled by default.

**Accepted values:**

* `true`
* `false`

### `active="0"`

```
(integer) Index of the tab that should be selected on page load with the left-most tab being 0
Default: 0
Requirement: Optional
```

By default the left-most tab is active, but if you wish to have a different tab open by default you can change the value of the `active` parameter. Tabs are numbered from left to right with 0 being the left-most tab, and increasing by 1 for each tab as you move to the right.

**Accepted values:**

Any positive integer (i.e. whole number).

### `event="click"`

```
(text) What event should trigger the tab: mouseover or click
Default: click
Requirement: Optional
```
We recommend leaving this as `click` (the default) unless you have a good reason to change it.

