<?php

#namespace viamarvin\Spintax;

class Spintax {
    public static function Parse($text)
    {
        return self::Process($text);
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
