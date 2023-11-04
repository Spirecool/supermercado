<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testCategoryIsCreated(): void
    {
        $category = new Category();

        $category->setLabel('test');

        $this->assertSame('test', $category->getlabel());
    }

    public function testCategoryIsNotCreated(): void
    {
        $category = new Category();

        $category->setLabel('');

        $this->assertSame('test', $category->getlabel());
    }
}

