<?php

namespace Repository\Example;

use Carbon\Carbon;
use Repository\Criteria;
use Repository\Example\Criteria\Available;
use Repository\Example\Criteria\MaximumSize;
use Repository\Example\Criteria\MinimumSize;
use Repository\Example\Criteria\RegisteredOn;

class ProductCriteria extends Criteria
{
    public static function fresh(): self
    {
        return new self();
    }

    // Fluent interface
    public function minimumSize(int $size): self
    {
        $this->criteria[] = new MinimumSize($size);

        return $this;
    }

    public function maximumSize(int $size): self
    {
        $this->criteria[] = new MaximumSize($size);

        return $this;
    }

    // Encapsulate some commonly repeated domain/query logic...
    public function newlyAvailable(): self
    {
        $this->criteria[] = new Available(true);
        $this->criteria[] = new RegisteredOn(Carbon::today());

        return $this;
    }
}
