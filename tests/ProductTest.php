<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIsTrue(): void
    {
        $product = new Category();

            $this->assertEmpty($product->getLabel());
    }
}