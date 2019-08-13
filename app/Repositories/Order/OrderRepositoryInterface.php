<?php
namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function findWithTime($data = [], $with = [], $dataSelect = ['*'], $startTime, $endTime);

    public function countWithTime($data = [], $dataSelect = ['*'], $startTime, $endTime);

    public function findWithMonth($data = [], $with = [], $dataSelect = ['*'], $year, $month);

    public function countWithMouth($data = [], $dataSelect = ['*'], $year, $month);
}
