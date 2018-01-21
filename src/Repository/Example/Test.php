<?php

namespace Repository\Example;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class Test
 * @package Repository\Example
 *
 * This test class extends the standard test class provided in every Laravel 5.5 application.
 * If you use this package in a standard Laravel installation this should work out of the box.
 * If you don't, you'll need to update the import to reference the base test class.
 */
class Test extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        // Make sure to first run the migration in src/Repository/Example
        $this->seed(Seeder::class);
    }

    /** @test */
    public function now_querying_the_database_is_a_pleasure(): void
    {
        $repository = new ProductRepository();

        $criteria = ProductCriteria::fresh()
            ->minimumSize(2)
            ->maximumSize(3);

        $products = $repository->find($criteria);

        $this->assertCount(2, $products);
        $this->assertEquals('Product 2', $products->get(0)->name);
        $this->assertEquals('Product 3', $products->get(1)->name);

        $criteria = ProductCriteria::fresh()
            ->newlyAvailable()
            ->maximumSize(3);

        $products = $repository->find($criteria);

        $this->assertCount(1, $products);
        $this->assertEquals('Product 3', $products->first()->name);
    }
}
