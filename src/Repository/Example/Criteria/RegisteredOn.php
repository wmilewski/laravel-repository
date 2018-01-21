<?php

namespace Repository\Example\Criteria;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Repository\Criterion;

class RegisteredOn implements Criterion
{
    private $date;

    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    public function apply(Builder $query)
    {
        $query->where('registered', $this->date);
    }
}
