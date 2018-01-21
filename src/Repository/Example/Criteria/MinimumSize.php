<?php

namespace Repository\Example\Criteria;

use Repository\Criterion;
use Illuminate\Database\Eloquent\Builder;

class MinimumSize implements Criterion
{
    private $size;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function apply(Builder $query)
    {
        $query->where('size', '>=', $this->size);
    }
}
