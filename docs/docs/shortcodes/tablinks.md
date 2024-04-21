---
sidebar_position: 3
---

# `tablinks` shortcode

:::info

The `[tablinks]` shortcode is intended more for designers and developers who want to add a dynamic list of links of tabs in a tab group elsewhere in the page, after the tabbed group it is linking to. This can be used, for example, to provide a link back to the top of a long tabbed group. The links aren't styled, it's up to the designer/developer to style the links to suit their needs.

Simply outputs a basic `<ul>` list with a class of `squelch-taas-tablink` which you can style in your CSS to suit your needs. This can be useful on longer pages where, after a tab block, you need to repeat the tab links to encourage the user to read further content from the tab block.

:::

## Usage


```
[tablinks]
```

**Required parameters:**

* None

**Available since:** v0.4

## Required content

Must appear **after** the `[tabs]` shortcode you want to display the tabs from, and can (currently) only be used to show the last set of tabs outputted when using nested tabs. 

## Example

```
[tabs]
[tab title="Product Description"]
This product features a number of…
[/tab]
[tab title="Optional add-ons"]
Add on the following modules to customize your purchase…
[/tab]
[/tabs]

[tablinks]
```

## Aliases

None.

## Parameters

None.

