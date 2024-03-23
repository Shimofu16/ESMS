<?php

use Illuminate\Support\Str;

if (!function_exists('slug')) {
    function slug($string)
    {
        $words = explode(' ', $string);
        $firstLetters = '';
        foreach ($words as $word) {
            // dd($words);
            if ($word != "NC" && $word != "II" && $word != "I") {
                $firstLetters .= Str::substr($word, 0, 1);
            }
        }

        return Str::upper(Str::slug($firstLetters));
    }
}
if (!function_exists('toSlug')) {
    function toSlug($string)
    {
        // $str = explode(' ', $string);
        // return Str::lower($str[0]) . '-' .  Str::lower($str[1]);

        return Str::replace(' ', '-', Str::lower($string));
    }
}

if (!function_exists('toLetter')) {
    function toLetter($word)
    {
        return Str::substr($word, 0);
    }
}
if (!function_exists('toShort')) {
    function toShort($word, $length)
    {
        return Str::substr($word,0, $length);
    }
}
