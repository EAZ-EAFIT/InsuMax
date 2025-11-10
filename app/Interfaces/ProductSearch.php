<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductSearch
{
    public function search(string $searchString, int $perPage): LengthAwarePaginator;
}
