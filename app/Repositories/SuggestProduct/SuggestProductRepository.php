<?php
namespace App\Repositories\SuggestProduct;

use App\Repositories\BaseRepository;
use App\Models\SuggestProduct;

class SuggestProductRepository extends BaseRepository implements SuggestRepositoryInterface
{
    //get model
    public function getModel()
    {
        return SuggestProduct::class;
    }
}
