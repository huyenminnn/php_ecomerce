<?php
namespace App\Repositories\InfoDelivery;

use App\Repositories\BaseRepository;
use App\Models\InfoDelivery;

class InfoDeliveryRepository extends BaseRepository implements InfoDeliveryRepositoryInterface
{
    //get model
    public function getModel()
    {
        return InfoDelivery::class;
    }
}
