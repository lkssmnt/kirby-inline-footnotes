<?php

use Kirby\Cms\App as Kirby;

require_once __DIR__ . '/lib/inlineFootnotes.php';

Kirby::plugin('lkssmnt/inline-footnotes', [
  'fieldMethods' => [
    'inlinefootnotes' => function ($field) {      
      return InlineFootnotes::convert($field);
    },
    'ifn' => function ($field) {
      return InlineFootnotes::convert($field);
    }
  ],
  'snippets'     => [
    'footnotes_reference' => __DIR__ . '/snippets/reference.php'
  ]
]);
