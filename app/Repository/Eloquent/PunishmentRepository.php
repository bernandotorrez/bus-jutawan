<?php

namespace App\Repository\Eloquent;

use App\Models\Punishments;

class PunishmentRepository extends BaseRepository
{
    public function __construct(Punishments $model)
    {
        parent::__construct($model);
    }

    public function getByUuid($id)
    {
        return $this->model->where('status', '1')->where('uuid_punishment', $id)->first();
    }
}
