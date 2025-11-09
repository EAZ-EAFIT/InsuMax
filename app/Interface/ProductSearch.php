<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

interface ProductSearch
{
    public function search(String $searchString): Builder;
}