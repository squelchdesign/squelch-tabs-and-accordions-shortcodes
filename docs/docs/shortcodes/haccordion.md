---
sidebar_position: 9
---

# `haccordion` shortcode

:::info

The `[haccordion]` shortcode (note: singular) tells **Squelch Tabs and Accordions** that you wish to create a single horizontal accordion panel. It should not be confused with the `[haccordions]` shortcode (plural), which creates the block of panels.

:::

## Usage


```
[haccordion title="Panel 0"]
Accordion panel 0 content
[/haccordion]
```

**Required parameters:**

* `title`.

## Required content

The `[haccordion]` shortcode will only work correctly when used inside of an `[haccordions]` shortcode. i.e.

```
[haccordions]
[haccordion title="Panel 0"]
Horizontal accordion panel 0 content
[/haccordion]
[/haccordions]
```

## Example

```
[haccordions]
[haccordion title="Earth"]
<img src="https://example.com/wp-content/uploads/earth.jpg" alt="The Earth, as seen from the moon" />
[/haccordion]
[haccordion title="The Sun"]
<img src="https://example.com/wp-content/uploads/sun.jpg" alt="Close-up of the sun's surface" />
[/haccordion]
[haccordion title="The Moon"]
<img src="https://example.com/wp-content/uploads/moon.jpg" alt="Full moon" />
[/haccordion]
[/haccordions]
```

## Aliases

* `[haccordion]` — top-level horizontal accordion panel shortcode
* `[subhaccordion]` — for embedding horizontal accordions inside of horizontal accordions (see [Nesting elements](../advanced/nesting-elements.md))
* `[subsubhaccordion]` — for embedding horizontal accordions inside of horizontal accordions (see [Nesting elements](../advanced/nesting-elements.md))

## Parameters

### `title=""`

```
(text) The title for this panel
Default: "      " (6 spaces)
Requirement: Technically optional, but you probably don't want to omit it
```

Every horizontal accordion panel should have a title. *Technically* this parameter is optional, but without it your horizontal accordion panel won't have a title.

**Accepted values:** any textual string. Remember though that WordPress does not allow shortcodes to be placed inside of parameters.

