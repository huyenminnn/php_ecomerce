<?php
namespace App\Repositories\SuggestProduct;

use App\Repositories\BaseRepository;
use App\Models\SuggestProduct;

class SuggestProductRepository extends BaseRepository
{
    //get model
    public function getModel()
    {
        return SuggestProduct::class;
    }
}
