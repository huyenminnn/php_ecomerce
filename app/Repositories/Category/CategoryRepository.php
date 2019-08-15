<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //get model
    public function getModel()
    {
        return Category::class;
    }
}
