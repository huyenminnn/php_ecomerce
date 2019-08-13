<?php
namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    //get model
    public function getModel()
    {
        return Order::class;
    }

    public function findWithTime($data = [], $with = [], $dataSelect = ['*'], $startTime, $endTime)
    {
        $result = $this->model
            ->select($dataSelect)
            ->where($data)
            ->where('created_at', '>', $startTime)
            ->where('created_at', '<', $endTime)
            ->with($with)
            ->get();

        return $result;
    }

    public function countWithTime($data = [], $dataSelect = ['*'], $startTime, $endTime)
    {
        $result = $this->model
            ->select($dataSelect)
            ->where($data)
            ->where('created_at', '>', $startTime)
            ->where('created_at', '<', $endTime)
            ->count();

        return $result;
    }

    public function findWithMonth($data = [], $with = [], $dataSelect = ['*'], $year, $month)
    {
        $result = $this->model
            ->select($dataSelect)
            ->where($data)
            ->with($with)
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get();

        return $result;
    }

    public function countWithMouth($data = [], $dataSelect = ['*'], $year, $month)
    {
        $result = $this->model
            ->select($dataSelect)
            ->where($data)
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->count();

        return $result;
    }
}
