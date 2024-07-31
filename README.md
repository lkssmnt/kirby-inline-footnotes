# Kirby Inline Footnotes

This very basic plugin borrows the functionality of [@sylvainjule](https://github.com/sylvainjule/kirby-footnotes) and extends Kirby 3 and 4 with inline footnotes.

## 1. Installation

Download and copy this repository to `/site/plugins/inline-footnotes`

## 2. Basic usage

Use the footnotes method on your field: `$page->text()->inlinefootnotes()` or `$page->text()->ifn()` (no need to call `->kirbytext()` before or after, this method will take care of it).

Adding footnotes to your Kirbytext field is simple. Just type them inline in your post in square brackets like this:

```
[^This is a footnote.]
```

Each footnote must start with a caret (`^`) and will be numbered automatically.

This will result in adding

- a reference-marker: `<sup id="fnref-1" data-ref="#fn-1" class="footnote-marker">1</sup>`
- and the hidden footnote: `<span id="fn-1" class="inline-footnote hidden">This is a footnote</span>`
  for every `[^footnote]`

You can simply toggle the hidden class by using JavaScript:

```
const allFootnoteMarkers = document.querySelectorAll('.footnote-marker');
allFootnoteMarkers.forEach(marker => {
  marker.addEventListener('click', () => {
    const ref = marker.getAttribute('data-ref');
    const footnote = document.querySelector(ref);
    footnote.classList.toggle('hidden');
  });
});

```

## 3. License

MIT

## 4. Credits

This plugin has been built on top of the Kirby Footnotes Plugin by [@sylvainjule](https://github.com/sylvainjule/kirby-footnotes) which is based on the K2 version by [@distantnative](https://github.com/distantnative/footnotes). 🙏
