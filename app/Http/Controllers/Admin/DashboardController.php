<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\StatusOrder;
use Carbon\Carbon;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;

class DashboardController extends Controller
{
    protected $productRepo;
    protected $userRepo;
    protected $orderRepo;

    public function __construct(
        ProductRepositoryInterface $productRepo,
        UserRepositoryInterface $userRepo,
        OrderRepositoryInterface $orderRepo
    )
    {
        $this->productRepo = $productRepo;
        $this->userRepo = $userRepo;
        $this->orderRepo = $orderRepo;
    }

    public function index()
    {
        $totalProducts = $this->productRepo->countAll();
        $totalUsers = $this->userRepo->countAll();
        $totalOrders = $this->orderRepo->count(['status' => StatusOrder::Confirmed]);

        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $revenue = 0;
        $orders = $this->orderRepo->findWithMonth(['status' => StatusOrder::Confirmed], ['orderDetails'], ['*'], $year, $month);

        foreach ($orders as $order) {
            $orderDetails = $order->orderDetails;
            foreach ($orderDetails as $value) {
                $revenue += $value->total;
            }
        }

        return view('manager_views.dashboard', [
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'revenue' => $revenue,
        ]);
    }

    public function statistic()
    {
        $year = Carbon::now()->year;
        $countOrder = [];
        $countProduct = [];
        for ($month = 1; $month <= 12; $month++) {
            $countOrder[] = $this->orderRepo->countWithMouth(['status' => StatusOrder::Confirmed], ['*'], $year, $month);

            $orders = $this->orderRepo->findWithMonth(['status' => StatusOrder::Confirmed], ['orderDetails'], ['*'], $year, $month);
            $quantity = 0;
            foreach ($orders as $order) {
                $orderDetails = $order->orderDetails;
                foreach ($orderDetails as $value) {
                    $quantity += $value->quantity;
                }
            }
            $countProduct[] = $quantity;
        }

        return ['order' => $countOrder, 'product' => $countProduct];
    }

    public function infoStatistic(Request $request)
    {
        $start = Carbon::parse($request->startTime);
        $end = Carbon::parse($request->endTime);
        $numOrder = $this->orderRepo->countWithTime(['status' => StatusOrder::Confirmed], ['*'], $start, $end);
        $orders = $this->orderRepo->findWithTime(['status' => StatusOrder::Confirmed], ['orderDetails'], ['*'], $start, $end);
        $product = 0;
        $revenue = 0;
        foreach ($orders as $order) {
            $orderDetails = $order->orderDetails;
            foreach ($orderDetails as $value) {
                $product += $value->product;
                $revenue += $value->total;
            }
        }

        $newProduct = $this->productRepo->countWithTime([], ['*'], $start, $end);

        $newUser = $this->userRepo->countWithTime([], ['*'], $start, $end);

        return [
            'order' => $numOrder,
            'product' => $product,
            'newProduct' => $newProduct,
            'newUser' => $newUser,
            'revenue' => $revenue,
        ];
    }
}
