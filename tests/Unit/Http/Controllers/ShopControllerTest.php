<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ShopController;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Models\Product;

class ShopControllerTest extends TestCase
{
    protected $controller;

    public function setUp(): void
    {
        $this->controller = new ShopController();
        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->controller);
        parent::tearDown();
    }

    public function test_index()
    {
        $view = $this->controller->index();
        $this->assertEquals('shopping_views.home', $view->getName());
        $this->assertArrayHasKey('top_products', $view->getData());
    }

    public function test_show_product_with_category_if_slug_incorrect()
    {
        $response = $this->controller->show('');
        $this->assertEquals('layouts.error', $response->getName());
    }

    public function test_show_product_with_category()
    {
        $response = $this->controller->show('cay_de_ban');
        $this->assertEquals('shopping_views.product_detail', $response->getName());
        $this->assertArrayHasKey('product', $response->getData());
        $this->assertArrayHasKey('sizes', $response->getData());
        $this->assertArrayHasKey('colors', $response->getData());
    }
}
