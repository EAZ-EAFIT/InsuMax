<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testSetNameAndGetName(): void
    {
        $product = new Product;

        $product->setName('Laptop');
        $this->assertEquals('Laptop', $product->getName());
    }

    public function testSetPriceAndGetPrice(): void
    {
        $product = new Product;

        $product->setPrice(15000);
        $this->assertEquals(15000, $product->getPrice());
    }
}
