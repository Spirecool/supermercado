<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCategoryIsTrue(): void
    {
        $product = new Category();

            $this->assertEmpty($product->getLabel());
    }
}

