<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Http\Controllers\ShopController;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Product;
use App\Models\Category;
use Mockery;

class ShopControllerTest extends TestCase
{
    protected $productRepoMock;
    protected $categoryRepoMock;

    public function setUp(): void
    {
        $this->productRepoMock = Mockery::mock(ProductRepositoryInterface::class . '[update, getHotProduct, findFirst]');
        $this->categoryRepoMock = Mockery::mock(CategoryRepositoryInterface::class . '[findFirst]');
        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->controller);
        parent::tearDown();
    }

    public function test_index()
    {
        $this->productRepoMock->shouldReceive('getHotProduct')
            ->with(config('constant.top'))
            ->once()
            ->andReturn(new Collection(array(new Product, new Product)));

        $controller = new ShopController($this->productRepoMock, $this->categoryRepoMock);

        $result = $controller->index();
        $data = $result->getData();

        $this->assertEquals('shopping_views.home', $result->getName());
        $this->assertArrayHasKey('top_products', $result->getData());
        $this->assertInstanceOf(Collection::class, $data['top_products']);
        $this->assertInstanceOf(Product::class, $data['top_products']->all()[0]);

    }

    public function test_show_product_with_category_if_slug_incorrect()
    {
        $slug = ['slug' => 'incorrect'];
        $this->productRepoMock->shouldReceive('findFirst')
            ->once()
            ->andReturn(null);

        $controller = new ShopController($this->productRepoMock, $this->categoryRepoMock);

        $result = $controller->show($slug);

        $this->assertEquals('layouts.error', $result->getName());
    }

    public function test_show_product_with_category_if_slug_correct()
    {
        $slug = ['slug' => 'correct'];
        $this->productRepoMock->shouldReceive('findFirst')
            ->once()
            ->andReturn(new Product);

        $controller = new ShopController($this->productRepoMock, $this->categoryRepoMock);

        $result = $controller->show($slug);
        $data = $result->getData();

        $this->assertEquals('shopping_views.product_detail', $result->getName());
        $this->assertArrayHasKey('product', $data);
        $this->assertArrayHasKey('sizes', $data);
        $this->assertArrayHasKey('colors', $data);
        $this->assertInstanceOf(Product::class, $data['product']);
    }

    public function test_show_product_with_category()
    {
        $slug = ['slug' => 'correct'];
        $category = Mockery::mock(Category::class . '[products]');
        $category->products = new Collection(array(new Product, new Product));
        $this->categoryRepoMock->shouldReceive('findFirst')
            ->once()
            ->andReturn($category);

        $controller = new ShopController($this->productRepoMock, $this->categoryRepoMock);

        $result = $controller->showProductWithCategory($slug);
        $data = $result->getData();

        $this->assertEquals('shopping_views.products', $result->getName());
        $this->assertArrayHasKey('productsWithCategory', $data);
        $this->assertArrayHasKey('category', $data);
        $this->assertInstanceOf(Category::class, $data['category']);
        $this->assertInstanceOf(Collection::class, $data['productsWithCategory']);
        $this->assertInstanceOf(Product::class, $data['productsWithCategory'][0]);
    }
}
