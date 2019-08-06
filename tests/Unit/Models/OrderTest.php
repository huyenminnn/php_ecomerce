<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\InfoDelivery;

class OrderTest extends TestCase
{
    protected $order;

    protected function setUp(): void
    {
        $this->order = new Order();
        parent::setUp();
    }

    protected function tearDown(): void
    {
        unset($this->order);
        parent::tearDown();
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'order_code',
            'total',
            'status',
            'reason_reject',
            'admin_id',
            'info_delivery',
            'delivery_unit'
        ], $this->order->getFillable());
    }

    public function test_table()
    {
        $this->assertEquals('orders', $this->order->getTable());
    }

    public function test_incrementing_key()
    {
        $this->assertEquals(['id' => 'int'], $this->order->getCasts());
    }

    public function test_date()
    {
        $this->assertEquals(['created_at', 'updated_at'], $this->order->getDates());
    }

    public function test_belongsTo_InfoDelivery()
    {
        $relation = $this->order->infoDelivery();
        $relation_model = $relation->getRelated();
        $key = $this->order->getKeyName();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(InfoDelivery::class, $relation_model);
        $this->assertEquals('info_delivery', $relation->getForeignKeyName());
        $this->assertEquals($key, $relation->getOwnerKeyName());
    }

    public function test_hasMany_OrderDetail()
    {
        $relation = $this->order->orderDetails();
        $relation_model = $relation->getRelated();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(OrderDetail::class, $relation_model);
        $this->assertEquals('order_code', $relation->getForeignKeyName());
    }
}
