<?php

#namespace viamarvin\Spintax;

class Spintax {
    static $countBlocks = 0;
    static $blocks = [];

    public static function Parse($text, $count = [])
    {
        if (strpos($text, '#block#') !== false) {
            $text = preg_replace_callback('|#block#(.*?)#/block#|si', ['Spintax', 'replaceBlock'], $text);

            $newBlocks = self::$blocks;
            shuffle($newBlocks);

            $count_from = $count_to = 0;
            if (!empty($count)) {
                $count_from = (int) $count[0] > 0 ? (int) $count[0] : 1;
                $count_to = ((int) $count[1] == 0 || (int) $count[1] > count($newBlocks)) ? count($newBlocks) : (int) $count[1];
            }

            $cntBlocks = rand($count_from, $count_to);
            $cntBlocks = ($cntBlocks == 0 || $cntBlocks > count($newBlocks)) ? count($newBlocks) : $cntBlocks;

            for ($i = 0; $i < $cntBlocks; $i++) {
                $p = implode("\n", $newBlocks[$i]);
                $text = str_replace('{#block' . ($i + 1) . '#}', $p, $text);
            }

            $text = preg_replace('|{#block.*?#}|si', '', $text);

            self::$countBlocks = 0;
            self::$blocks = array();
        }

        return self::Process($text);
    }

    private static function replaceBlock($text)
    {
        if (!empty($text[1])) {
            preg_match_all('|#p#(.*?)#/p#|si', $text[1], $matches);
            if (!empty($matches[1])) {
                $p = $matches[1];
                shuffle($p);

                foreach ($p AS $key => $val) {
                    if (empty($val)) continue;

                    $test = explode('#s#', $val);
                    $index = array_rand($test, 1);
                    $test = $test[$index];

                    $test = explode("\n", $test);
                    shuffle($test);

                    $text = implode("\n", $test);

                    self::$blocks[self::$countBlocks][] = $text;
                }
            } else {
                self::$blocks[self::$countBlocks][] = trim($text[1]);
            }
        }

        self::$countBlocks++;
        return '{#block' . self::$countBlocks . '#}';
    }

    private static function Process($text)
    {
        $pattern = '/\{(((?>[^\{\}]+)|(?R))*)\}/x';
        return preg_replace_callback($pattern, ['Spintax', 'Replace'], $text);
    }

    private static function Replace($text)
    {
        $text = self::Process($text[1]);
        $parts = explode('|', $text);

        return $parts[array_rand($parts)];
    }
}
