---
sidebar_position: 1
---

# Nesting elements

## How not to do it

Nesting different types of widgets inside of each other can be done without any changes to your shortcodes, e.g. adding an accordion inside of a tab:

```
[tabs]
[tab title="Tab with an accordion inside it"]

[accordions]
[accordion title="Accordion inside a tab"]

This is valid.

[/accordion]
[/accordions]

[/tab]
[/tabs]

```

However WordPress does not support nested shortcodes of the same kind, so the following will not work:

:::warning

This is an example to demonstrate **what doesn't work**:

:::

```
[tabs title="OUTER TABS"]
[tab title="Outer tab"]

[tabs title="INNER TABS"]
[tab title="Inner tab"]

This will NOT work: you cannot place the "tabs" shortcode inside of another "tabs" shortcode, nor can you place the "tab" shortcode inside of another "tab" shortcode.

[/tab]
[/tabs]

[/tab]
[/tabs]
```

## History and overview

To get around this issue and allow elements to be nested inside of other elements a number of new shortcodes were introduced around version 0.2:

* Tabs:
  * `[subtabs]` (an alias of `[tabs]`,
  * `[subsubtabs]` (an alias of `[tabs]`,
  * `[subtab]` (an alias of `[tab]`),
  * `[subsubtab]` (an alias of `[tab]`),
* Accordions:
  * `[subaccordions]` (an alias of `[accordions]`),
  * `[subsubaccordions]` (an alias of `[accordions]`),
  * `[subaccordion]` (an alias of `[accordion]`),
  * `[subsubaccordion]` (an alias of `[accordion]`).
* Horizontal accordions:
  * `[subhaccordions]` (an alias of `[haccordions]`),
  * `[subsubhaccordions]` (an alias of `[haccordions]`),
  * `[subhaccordion]` (an alias of `[haccordion]`),
  * `[subsubhaccordion]` (an alias of `[haccordion]`),
* Toggles:
  * `[subtoggles]` (an alias of `[toggles]`),
  * `[subsubtoggles]` (an alias of `[toggles]`),
  * `[subtoggle]` (an alias of `[toggle]`),
  * `[subsubtoggle]` (an alias of `[toggle]`).

These shortcodes can be used in place of the shortcodes that they alias, and their behaviour will be identical.

So to make the previous example code above correct, the inner tabs need to have “sub” prepended to their shortcodes:

```
[tabs title="OUTER TABS"]
[tab title="Outer tab"]

[subtabs title="INNER TABS"]
[subtab title="Inner tab"]

This will work as there are no tags of the same kind nested inside of each other.

[/subtab]
[/subtabs]

[/tab]
[/tabs]
```

You can nest up to three levels deep:

```
[tabs title="OUTER TABS"]
[tab title="Outer tab"]

[subtabs title="MIDDLE TABS"]
[subtab title="Middle tab"]

[subsubtabs title="INNER TABS"]
[subsubtab title="Inner tab"]

A tab inside of a tab inside of a tab.

[/subsubtab]
[/subsubtabs]

[/subtab]
[/subtabs]

[/tab]
[/tabs]
```

:::info

You should always consider carefully whether you really *need* to embed one element inside of another, especially elements of the same kind. "Tabs in tabs", for example, has often been talked about as an example of bad user interface design.

:::

## Usability and User Experience

Knives and forks fit perfectly into the opening of a toaster, but *should* you insert a metal utensil into an electric toaster? Probably not. Likewise you *can* nest the elements provided by **Squelch Tabs and Accordions** inside of one another, but just because you *can* doesn't necessarily mean that you *should*. The plugin doesn't attempt to enforce good user interface design, that responsibility is left entirely to the designer, and "with great power comes great responsibility".

To quote [UX Design World](https://uxdworld.com/2022/10/05/tabs-navigation-design-best-practices/#nested-tabs):

> "Avoid using nested tabs as it makes it difficult to relate the content within each tab and its nested tabs. If you need to organize content in nested tabs, it is better to design them using different visuals or another design pattern."

In my own tests I have concluded that the same holds true of embedding any element within an element of the same type, such as accordions within accordions. It quickly becomes very confusing as to which headings belong to which element, and what clicking any particular element will actually achieve.

For these reasons I don't recommend embedding tabs in tabs, accordions in accordions, horizontal accordions within horizontal accordions, nor toggles within toggles. Where you find yourself wanting to do this ask yourself whether there is another, clearer way to express the information you want to share with your users. Consider mixing the elements you are nesting, or not nesting at all. Maybe move some information to a new section of the page or even to a new page entirely. Maybe you could add more panels to the outermost element instead. Or maybe you should reconsider how you want to break the information down entirely to simplify its display.

## More examples

### Accordions in accordions:

```
[accordions title="OUTER ACCORDION"]
[accordion title="Outer accordion"]

[subaccordions title="MIDDLE ACCORDION"]
[subaccordion title="Middle accordion"]

[subsubaccordions title="INNER ACCORDION"]
[subsubaccordion title="Inner accordion"]

An accordion inside of an accordion inside of an accordion.

[/subsubaccordion]
[/subsubaccordions]

[/subaccordion]
[/subaccordions]

[/accordion]
[/accordions]
```

### Horizontal accordions inside of horizontal accordions

```
[haccordions title="OUTER ACCORDION" height="400"]
[haccordion title="Outer accordion"]

[subhaccordions title="MIDDLE ACCORDION" height="331"]
[subhaccordion title="Middle accordion"]

[subsubhaccordions title="INNER ACCORDION" height="262"]
[subsubhaccordion title="Inner accordion"]

An accordion inside of an accordion inside of an accordion.

[/subsubhaccordion]
[/subsubhaccordions]

[/subhaccordion]
[/subhaccordions]

[/haccordion]
[/haccordions]
```

:::warning

During testing I have found that horizontal accordions inside of horizontal accordions, in particular, offer an incredibly poor user experience, and so I strongly recommend against this particular design pattern. However, for the sake of completeness, the ability to do so remains. It's up to **you** to ensure you're providing the best user experience on your website.

A better solution would be to mix different elements, such as tabs with a horizontal accordion inside; or an accordion with a horizontal accordion inside.

:::

### Toggles in toggles

```
[toggles title="OUTER TOGGLE"]
[toggle title="Outer toggle"]

[subtoggles title="MIDDLE TOGGLE"]
[subtoggle title="Middle toggle"]

[subsubtoggles title="INNER TOGGLE"]
[subsubtoggle title="Inner toggle"]

A toggle inside of a toggle inside of a toggle.

[/subsubtoggle]
[/subsubtoggles]

[/subtoggle]
[/subtoggles]

[/toggle]
[/toggles]
```
