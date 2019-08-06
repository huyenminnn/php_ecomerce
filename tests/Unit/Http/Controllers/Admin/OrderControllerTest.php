<?php

namespace Tests\Unit\Http\Controllers\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Mockery;
use App\Http\Controllers\Admin\OrderController;
use App\Enums\StatusOrder;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderControllerTest extends TestCase
{
    protected $orderMock;

    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->orderMock = Mockery::mock(Order::class)->makePartial();
        });

        parent::setUp();
    }
    public function test_index_return_view()
    {
        $controller = new OrderController();

        $view = $controller->index();
        $this->assertEquals('manager_views.order', $view->getName());
    }

    public function test_datatable()
    {
        $controller = new OrderController();

        $data = $controller->getData();
        $this->assertInstanceOf(JsonResponse::class, $data);
    }

    public function test_confirm_order_if_id_incorrect()
    {
        $controller = new OrderController();
        $id = 0;

        $data = [
            'data' => 'confirm',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

        $response = $controller->update($request, $id);
        $this->assertEquals('layouts.error', $response->getName());
    }

    public function test_confirm_order_if_id_correct()
    {
        $controller = new OrderController();

        $data = [
            'data' => 'confirm',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

        $order = new Order();
        $order->id = 1;
        $order->status = 0;

        $orderTest = Mockery::mock(Order::class . '[update]');
        $orderTest->shouldReceive('update')->once();
        $this->ock->shouldReceive('find')->once()->andReturn($orderTest);

        $this->action('PUT', 'orders.update', 1, Input::all());

    $this->assertRedirectedTo('admin/orders/1');

        // $this->orderMock
        //     ->shouldReceive('find')
        //     ->with(1)
        //     ->once()
        //     ->andReturn($order);
        // $this->app->instance(Order::class, $this->orderMock->find(1));
        // $response = $this->orderMock->find;
        // var_dump($this->orderMock->find(1)->id);
        // var_dump($this->orderMock->find(1)->id);
        // $response = $controller->update($request, 1);
        // var_dump($response);
        // $this->assertInstanceOf(Order::class, $response);
    }
}
