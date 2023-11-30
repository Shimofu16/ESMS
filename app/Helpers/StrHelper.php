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

if (! function_exists('toLetter')) {
    function toLetter($word){
        return Str::substr($word, 0);
    }
}
