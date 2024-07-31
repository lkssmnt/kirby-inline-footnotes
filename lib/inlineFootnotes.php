<?php

class InlineFootnotes
{
  public static array $footnotes = [];

  public static function convert($text)
  {

    $matches = null;
    $references = null;
    $notes = null;
    $notesArr = [];

    if (preg_match_all('/\[(\^.*?)(?<!\\\)\]/s', $text, $matches)) {

      $references = $matches[0];
      $notes = self::strip($matches);

      $count = 1;
      $order = 1;

      foreach ($notes as $key => $note) {
        $data = ['count' => $count, 'order' => $order, 'note' => $note];
        $text = self::str_replace_first($references[$key], snippet('footnotes_reference', $data, true), $text);
        $notesArr[] = $data;

        $count++;
        $order++;
      }

      return $text;
    }
  }

  /* UTILS */

  public static function strip($matches)
  {
    return array_map(function ($match) use ($matches) {
      $match = preg_replace('/\[(\^(.*?))(?<!\\\)\]/s', '\2', $match);
      $match = str_replace(array('<p>', '</p>'), '', kirbytext($match));
      return $match;
    }, $matches[0]);
  }

  public static function str_replace_first($search, $replace, $str)
  {
    $pos = strpos($str, $search);
    if ($pos !== false) {
      return substr_replace($str, $replace, $pos, strlen($search));
    }
    return $str;
  }
}
