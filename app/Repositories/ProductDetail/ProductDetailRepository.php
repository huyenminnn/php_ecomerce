<?php
namespace App\Repositories\ProductDetail;

use App\Repositories\BaseRepository;
use App\Models\ProductDetail;

class ProductDetailRepository extends BaseRepository implements ProductDetailRepositoryInterface
{
    //get model
    public function getModel()
    {
        return ProductDetail::class;
    }
}
