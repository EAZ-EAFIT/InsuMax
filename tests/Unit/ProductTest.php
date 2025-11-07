<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_set_name_and_get_name()
    {
        $product = new Product;

        $product->setName('Laptop');
        $this->assertEquals('Laptop', $product->getName());
    }

    public function test_set_price_and_get_price()
    {
        $product = new Product;

        $product->setPrice(15000);
        $this->assertEquals(15000, $product->getPrice());
    }
}
