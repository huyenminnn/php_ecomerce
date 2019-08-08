<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    //get model
    public function getModel()
    {
        return Category::class;
    }
}
