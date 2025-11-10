<?php

namespace App\Utils;

class StringUtils
{
    public static function processKeywords(string $keywords): string
    {
        return str_replace(' ', '', $keywords);
    }
}
