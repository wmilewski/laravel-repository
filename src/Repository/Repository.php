<?php

namespace Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class Repository
{
    public function find(Criteria $criteria): Collection
    {
        $query = $this->newQuery();

        $criteria->apply($query);

        return $query->get();
    }

    abstract protected function newQuery(): Builder;
}
