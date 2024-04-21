---
sidebar_position: 2
---

# `tab` shortcode

:::info

The `[tab]` shortcode (note: singular) tells **Squelch Tabs and Accordions** that you wish to create a *single tab* within a block of tabs. It should not be confused with the `[tabs]` shortcode (plural), which creates the block.

:::

## Usage

```
[tab title="Tab 0" icon="" iconalt="" iconw="" iconh="" class=""]
Tab 0 content
[/tab]
```

**Required parameters:**

* `title`

## Required content

The `[tab]` shortcode will only work correctly when used inside of a `[tabs]` shortcode. i.e.

```
[tabs]
[tab title="Tab 0" icon="" iconalt="" iconw="" iconh="" class=""]
Tab 0 content
[/tab]
[/tabs]
```

## Example

```
[tabs]
[tab title="First tab of four"]
This is the first tab.
[/tab]
[tab title="Second tab of four"]
This is the second tab.
[/tab]
[tab title="Third tab of four"]
This is the third tab.
[/tab]
[tab title="Fourth tab of four"]
This is the fourth and final tab.
[/tab]
[/tabs]
```

## Aliases

* `[tab]` — top-level tab shortcode
* `[subtab]` — for embedding tabs inside of tabs (see Nesting elements)
* `[subsubtab]` — for embedding tabs inside of tabs (see Nesting elements)

## Parameters

### `title=""`

```
(text) The title shown on the tab
Default: "       " (7 spaces)
Requirement: Technically optional, but you probably don't want to omit it
```

Every tab should have a title. *Technically* this parameter is optional, but without it your tab won't have a title. You could omit this parameter if you are using icons, but even then it's still recommended to provide a textual title in addition to the icon.

**Accepted values:** any textual string. Remember though that WordPress does not allow shortcodes to be placed inside of parameters.

### `icon=""`

```
(url) Link to an icon to show on the left hand side of the tab
Default: "" (no icon)
Requirement: Optional
```

Icons can optionally be added to your tabs. This can be in the form of a URL to an image to use as the icon, e.g.

```
[tab title="About" icon="https://example.com/wp-content/2024/04/tab-icon-thumbs-up.png"]
```

You can also use a **Data URL** to add an icon, e.g.

```
[tab title="More info" icon="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iY3VycmVudENvbG9yIiBjbGFzcz0iYmkgYmktaGFuZC10aHVtYnMtdXAiIHZpZXdCb3g9IjAgMCAxNiAxNiI+CiAgPHBhdGggZD0iTTguODY0LjA0NkM3LjkwOC0uMTkzIDcuMDIuNTMgNi45NTYgMS40NjZjLS4wNzIgMS4wNTEtLjIzIDIuMDE2LS40MjggMi41OS0uMTI1LjM2LS40NzkgMS4wMTMtMS4wNCAxLjYzOS0uNTU3LjYyMy0xLjI4MiAxLjE3OC0yLjEzMSAxLjQxQzIuNjg1IDcuMjg4IDIgNy44NyAyIDguNzJ2NC4wMDFjMCAuODQ1LjY4MiAxLjQ2NCAxLjQ0OCAxLjU0NSAxLjA3LjExNCAxLjU2NC40MTUgMi4wNjguNzIzbC4wNDguMDNjLjI3Mi4xNjUuNTc4LjM0OC45Ny40ODQuMzk3LjEzNi44NjEuMjE3IDEuNDY2LjIxN2gzLjVjLjkzNyAwIDEuNTk5LS40NzcgMS45MzQtMS4wNjRhMS44NiAxLjg2IDAgMCAwIC4yNTQtLjkxMmMwLS4xNTItLjAyMy0uMzEyLS4wNzctLjQ2NC4yMDEtLjI2My4zOC0uNTc4LjQ4OC0uOTAxLjExLS4zMy4xNzItLjc2Mi4wMDQtMS4xNDkuMDY5LS4xMy4xMi0uMjY5LjE1OS0uNDAzLjA3Ny0uMjcuMTEzLS41NjguMTEzLS44NTcgMC0uMjg4LS4wMzYtLjU4NS0uMTEzLS44NTZhMiAyIDAgMCAwLS4xMzgtLjM2MiAxLjkgMS45IDAgMCAwIC4yMzQtMS43MzRjLS4yMDYtLjU5Mi0uNjgyLTEuMS0xLjItMS4yNzItLjg0Ny0uMjgyLTEuODAzLS4yNzYtMi41MTYtLjIxMWExMCAxMCAwIDAgMC0uNDQzLjA1IDkuNCA5LjQgMCAwIDAtLjA2Mi00LjUwOUExLjM4IDEuMzggMCAwIDAgOS4xMjUuMTExek0xMS41IDE0LjcyMUg4Yy0uNTEgMC0uODYzLS4wNjktMS4xNC0uMTY0LS4yODEtLjA5Ny0uNTA2LS4yMjgtLjc3Ni0uMzkzbC0uMDQtLjAyNGMtLjU1NS0uMzM5LTEuMTk4LS43MzEtMi40OS0uODY4LS4zMzMtLjAzNi0uNTU0LS4yOS0uNTU0LS41NVY4LjcyYzAtLjI1NC4yMjYtLjU0My42Mi0uNjUgMS4wOTUtLjMgMS45NzctLjk5NiAyLjYxNC0xLjcwOC42MzUtLjcxIDEuMDY0LTEuNDc1IDEuMjM4LTEuOTc4LjI0My0uNy40MDctMS43NjguNDgyLTIuODUuMDI1LS4zNjIuMzYtLjU5NC42NjctLjUxOGwuMjYyLjA2NmMuMTYuMDQuMjU4LjE0My4yODguMjU1YTguMzQgOC4zNCAwIDAgMS0uMTQ1IDQuNzI1LjUuNSAwIDAgMCAuNTk1LjY0NGwuMDAzLS4wMDEuMDE0LS4wMDMuMDU4LS4wMTRhOSA5IDAgMCAxIDEuMDM2LS4xNTdjLjY2My0uMDYgMS40NTctLjA1NCAyLjExLjE2NC4xNzUuMDU4LjQ1LjMuNTcuNjUuMTA3LjMwOC4wODcuNjctLjI2NiAxLjAyMmwtLjM1My4zNTMuMzUzLjM1NGMuMDQzLjA0My4xMDUuMTQxLjE1NC4zMTUuMDQ4LjE2Ny4wNzUuMzcuMDc1LjU4MSAwIC4yMTItLjAyNy40MTQtLjA3NS41ODItLjA1LjE3NC0uMTExLjI3Mi0uMTU0LjMxNWwtLjM1My4zNTMuMzUzLjM1NGMuMDQ3LjA0Ny4xMDkuMTc3LjAwNS40ODhhMi4yIDIuMiAwIDAgMS0uNTA1LjgwNWwtLjM1My4zNTMuMzUzLjM1NGMuMDA2LjAwNS4wNDEuMDUuMDQxLjE3YS45LjkgMCAwIDEtLjEyMS40MTZjLS4xNjUuMjg4LS41MDMuNTYtMS4wNjYuNTZ6Ii8+Cjwvc3ZnPg=="]
```

Be very careful to keep the images file sizes as small as possible for the sake of your page loading speed!

The plugin also works with the official Font Awesome Icons plugin. With the plugin active simply specify the name of a Font Awesome icon and the plugin will use it.

You can also use the Simple Icons plugin to render icons. With the Simple Icons plugin active simply specify the name of one of their icons to use it.

:::info

If you specify an icon image then you should also specify an `iconalt=""` parameter to explain what the image is to blind and low-vision users who rely on screen reader technologies. If you use a Font Awesome icon or a Simple Icons icon then the `iconalt=""` parameter is ignored.

:::

**Accepted values:**

Any valid URL, including data URLs beginning with `data:image/`.

With the Font Awesome Icons plugin activated: any valid Font Awesome Icon name that can be passed to the Font Awesome Icons plugin.

With the Simple Icons plugin activated: any valid Simple Icons name that can be passed to the Simple Icons plugin.

### `iconalt=""`

```
(text) The alt text to add to the icon (for screen readers and search engines)
Default: The value of `title`
Requirement: Optional — but very strongly encouraged if you specify an icon image
```

For accessibility (also known as a11y) images that convey meaning should always have an `alt` attribute. This parameter allows you to specify the `alt` that is placed on the icon to allow screen readers to tell low vision and blind users what the icon is. e.g.

```
[tab title="About" iconalt="Thumbs up icon" icon="https://example.com/wp-content/2024/04/tab-icon-thumbs-up.png"]
```

**Accepted values:** any textual string. Remember though that WordPress does not allow shortcodes to be placed inside of parameters.

### `iconw=""`

```
(integer) Width of the icon
Default: Width not explicitly set, let browser size image automatically
Requirement: Optional
```

You can set the width and height of your icon with the `iconw` and `iconh` parameters.

**Accepted values:** any positive integer (whole number).

### `iconh=""`

```
(integer) Height of the icon
Default: Height not explicitly set, let browser size image automatically
Requirement: Optional
```

You can set the width and height of your icon with the `iconw` and `iconh` parameters.

**Accepted values:** any positive integer (whole number).

### `class=""`

```
(text) Class(es) to add to the tab and content area
Default: (empty)
Requirement: Optional
```

This parameter allows you to add classes to your tab. You can then use CSS to apply extra styles, or perhaps trigger an event in JavaScript.

**Accepted values:** any textual string. Remember to follow the rules for class names.

