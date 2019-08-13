<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //get model
    public function getModel()
    {
        return User::class;
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
