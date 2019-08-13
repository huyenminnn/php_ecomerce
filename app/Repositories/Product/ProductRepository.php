<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //get model
    public function getModel()
    {
        return Product::class;
    }

    //get hot products by rating
    public function getHotProduct($number)
    {
        $result = $this->model->orderBy('rating', 'desc')->take($number)->get();

        return $result;
    }

    //get best seller product by number of products sold
    public function getBestSellerProduct($number)
    {
        $result = $this->model->orderBy('sell', 'desc')->take($number)->get();

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
}
