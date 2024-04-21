---
sidebar_position: 9
---

# `haccordion` shortcode (TODO)

:::info

The `[haccordion]` shortcode (note: singular) tells **Squelch Tabs and Accordions** that you wish to create a single haccordion panel with an haccordion block. It should not be confused with the `[accordions]` shortcode (plural), which creates the block.

:::

## Usage


```
[haccordion title="Pane 0" header="h3"]
Accordion pane 0 content
[/haccordion]
```

**Required parameters:**

* `title`.

## Required content

The `[haccordion]` shortcode will only work correctly when used inside of an `[accordions]` shortcode. i.e.

```
[accordions]
[haccordion title="Pane 0" header="h3"]
Accordion pane 0 content
[/haccordion]
[/accordions]
```

## Example

```
[accordions]
[haccordion title="How far is the earth from the sun?"]
The earth is exactly 1 Astronomical Unit, approximately 93 million miles or 150 million km, from the sun.
[/haccordion]
[haccordion title="How large is the sun?"]
If the sun were hollow the earth could fit inside of it more than 1 million times.
[/haccordion]
[haccordion title="How long does the sun's light take to reach earth?"]
The sunlight you see out of your window took about 8 minutes to travel from the sun.
[/haccordion]
[/accordions]
```

## Aliases

* `[haccordion]` — top-level haccordion shortcode
* `[subaccordion]` — for embedding accordions inside of accordions (see Nesting elements)
* `[subsubaccordion]` — for embedding accordions inside of accordions (see Nesting elements)

## Parameters

### `title=""`

```
(text) The title for this pane
Default: ”      ” (6 spaces)
Requirement: Technically optional, but you probably don't want to omit it
```

Every haccordion should have a title. *Technically* this parameter is optional, but without it your haccordion won't have a title.

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

