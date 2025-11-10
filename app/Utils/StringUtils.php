<?php

namespace App\Utils;

use App\Models\Product;

class StringUtils
{
    public static function processKeywords(string $keywords): string
    {
        return str_replace(' ', '', $keywords);
    }
}
