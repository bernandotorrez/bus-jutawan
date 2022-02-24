<?php

namespace App\Repository\Eloquent;

use Illuminate\Support\Facades\DB;

class BaseRepository implements BaseInterface
{
    protected $model;
    protected $primaryKey;
    protected $searchableColumn;
    protected $searchableColumnView;
    protected $orderBy;

    public function __construct($model)
    {
        $this->model = $model;
        $this->primaryKey = (new $model)->getKeyName();
        $this->searchableColumn = (new $model)->getSearchableColumn();
        $this->searchableColumnView = (new $model)->getSearchableColumnView();
        $this->orderBy = (new $model)->getOrderBy();
    }

    /**
     * Get All Data, Including Non-Active / Disabled / Deleted
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->orderBy($this->orderBy['by'], $this->orderBy['order'])->get();
    }

    /**
     * Get All Data (Status = 1)
     *
     * @return Collection
     */
    public function allActive()
    {
        return $this->model->select($this->searchableColumn)->where('status', '1')->orderBy($this->orderBy['by'], $this->orderBy['order'])->get();
    }

    /**
     * Get All Data Active (Status = 1)
     * @param array $with
     * @return Collection
     */
    public function allActiveRelation(array $with)
    {
        return $this->model->select($this->searchableColumn)->where('status', '1')->orderBy($this->orderBy['by'], $this->orderBy['order'])->with($with)->get();
    }

    /**
     * Get All Data (Status = 1) using Query View
     *
     * @param string $viewName
     * @return Collection
     */
    public function allActiveView(string $viewName)
    {
        return DB::table($viewName)->select($this->searchableColumnView)->where('status', '1')->orderBy($this->orderBy['by'], $this->orderBy['order'])->get();
    }

    /**
     * Get Data By Primary Key
     *
     * @return Collection
     */
    public function getById($id)
    {
        return $this->model->where($this->primaryKey, $id)->first();
    }

    /**
     * Insert Data
     *
     * @param array $data
     * @return Collection
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Insert Data
     *
     * @param mixed $id
     * @param array $data
     * @return Collection
     */
    public function update($id, array $data)
    {
        return $this->model->where($this->primaryKey, $id)->update($data);
    }

    /**
     * Delete Data (One Row)
     *
     * @param mixed $id
     * @return Collection
     */
    public function delete($id)
    {
        return $this->model->where($this->primaryKey, $id)->update(['status' => '0']);
    }

    /**
     * Delete Many Data
     *
     * @param array $id
     */
    public function massDelete(array $id)
    {
        return $this->model->whereIn($this->primaryKey, $id)->update(['status' => '0']);
    }

     /**
     * Delete All Active Data (For Import Data Only)
     */
    public function deleteAll()
    {
        return $this->model->where('status', '1')->update(['status' => '0']);
    }

    /**
     * Check Duplicate Data
     *
     * @param array @where
     * @return Collection
     */
    public function findDuplicate(array $where)
    {
        return $this->model->select($this->primaryKey)->where($where)->where('status', '1')->count();
    }

    /**
     * Check Duplicate Data in Edit
     *
     * @param mixed $id
     * @param array $where
     */
    public function findDuplicateEdit($id, array $where)
    {
        return $this->model->select($this->primaryKey)->where($where)->where('status', '1')->where($this->primaryKey, '!=', $id)->count();
    }

    /**
     * Get Primary Key of the Model
     *
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function withRelation(int $id, array $relations)
    {
        return $this->model->with($relations)->where($this->primaryKey, $id)->where('status', '1')->first();
    }
}
