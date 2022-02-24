<?php

namespace App\Repository\Eloquent;

use App\Models\Rewards;

class RewardsRepository extends BaseRepository
{
    public function __construct(Rewards $model)
    {
        parent::__construct($model);
    }

    public function getByUuid($id)
    {
        return $this->model->where('status', '1')->where('uuid_reward', $id)->first();
    }
}
