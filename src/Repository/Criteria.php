<?php

namespace Repository;

use Illuminate\Database\Eloquent\Builder;

abstract class Criteria
{
    protected $criteria = [];

    public function apply(Builder $query): void
    {
        foreach ($this->criteria as $criterion) {
            $criterion->apply($query);
        }
    }
}
