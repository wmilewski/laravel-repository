<?php

namespace Repository;

use Illuminate\Database\Eloquent\Builder;

interface Criterion
{
  public function apply(Builder $query);
}
