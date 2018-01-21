<?php

namespace Repository\Example;

use Illuminate\Database\Eloquent\Builder;
use Repository\Repository;

class ProductRepository extends Repository
{
    protected function newQuery(): Builder
    {
        return Product::query();
    }
}
