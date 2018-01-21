<?php

namespace Repository\Example\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Repository\Criterion;

class Available implements Criterion
{
    private $available;

    public function __construct(bool $available)
    {
        $this->available = $available;
    }

    public function apply(Builder $query)
    {
        $query->where('available', $this->available);
    }
}
