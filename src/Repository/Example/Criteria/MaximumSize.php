<?php

namespace Repository\Example\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Repository\Criterion;

class MaximumSize implements Criterion
{
    private $size;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function apply(Builder $query)
    {
        $query->where('size', '<=', $this->size);
    }
}
