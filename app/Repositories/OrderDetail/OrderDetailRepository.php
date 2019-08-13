<?php
namespace App\Repositories\OrderDetail;

use App\Repositories\BaseRepository;
use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    //get model
    public function getModel()
    {
        return OrderDetail::class;
    }

    public function sum($data = [])
    {
        return $this->model->where($data)->sum();
    }
}
