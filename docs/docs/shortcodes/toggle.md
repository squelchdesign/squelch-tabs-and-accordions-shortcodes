---
sidebar_position: 7
---

# `toggle` shortcode (TODO)

:::info

The `[toggle]` shortcode (note: singular) tells **Squelch Tabs and Accordions** that you wish to create a single toggle panel with an toggle block. It should not be confused with the `[accordions]` shortcode (plural), which creates the block.

:::

## Usage


```
[toggle title="Pane 0" header="h3"]
Accordion pane 0 content
[/toggle]
```

**Required parameters:**

* `title`.

## Required content

The `[toggle]` shortcode will only work correctly when used inside of an `[accordions]` shortcode. i.e.

```
[accordions]
[toggle title="Pane 0" header="h3"]
Accordion pane 0 content
[/toggle]
[/accordions]
```

## Example

```
[accordions]
[toggle title="How far is the earth from the sun?"]
The earth is exactly 1 Astronomical Unit, approximately 93 million miles or 150 million km, from the sun.
[/toggle]
[toggle title="How large is the sun?"]
If the sun were hollow the earth could fit inside of it more than 1 million times.
[/toggle]
[toggle title="How long does the sun's light take to reach earth?"]
The sunlight you see out of your window took about 8 minutes to travel from the sun.
[/toggle]
[/accordions]
```

## Aliases

* `[toggle]` — top-level toggle shortcode
* `[subaccordion]` — for embedding accordions inside of accordions (see Nesting elements)
* `[subsubaccordion]` — for embedding accordions inside of accordions (see Nesting elements)

## Parameters

### `title=""`

```
(text) The title for this pane
Default: ”      ” (6 spaces)
Requirement: Technically optional, but you probably don't want to omit it
```

Every toggle should have a title. *Technically* this parameter is optional, but without it your toggle won't have a title.

**Accepted values:** any textual string. Remember though that WordPress does not allow shortcodes to be placed inside of parameters.

### `header="h3"`

```
(text) The element to render the title with, e.g. h4
Default: "h3"
Requirement: Optional
```

Accordion titles are rendered as `<h3>` tags by default, but you can customize that with this parameter.

**Accepted values:**

* `h1`
* `h2`
* `h3`
* `h4`
* `h5`
* `h6`

