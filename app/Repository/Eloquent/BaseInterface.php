<?php

namespace App\Repository\Eloquent;

interface BaseInterface
{
    public function all();
    public function allActive();
    public function allActiveRelation(array $with);
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function massDelete(array $id);
    public function findDuplicate(array $where);
    public function findDuplicateEdit($id, array $where);
    public function getPrimaryKey();
}
