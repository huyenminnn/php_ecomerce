<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository
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
}
