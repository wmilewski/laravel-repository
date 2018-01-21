<?php

namespace Repository\Example;

use Carbon\Carbon;
use Illuminate\Database\Seeder as BaseSeeder;

class Seeder extends BaseSeeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Product 1', 'size' => 1, 'registered' => Carbon::yesterday(), 'available' => true],
            ['name' => 'Product 2', 'size' => 2, 'registered' => Carbon::yesterday(), 'available' => false],
            ['name' => 'Product 3', 'size' => 3, 'registered' => Carbon::today(), 'available' => true],
            ['name' => 'Product 4', 'size' => 4, 'registered' => Carbon::today(), 'available' => true],
            ['name' => 'Product 5', 'size' => 5, 'registered' => Carbon::today(), 'available' => false],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
