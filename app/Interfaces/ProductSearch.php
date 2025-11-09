<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductSearch
{
    public function search(String $searchString): LengthAwarePaginator;
}