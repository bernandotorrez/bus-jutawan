<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punishments extends Model
{
    use HasFactory;

    protected $table = 'tbl_punishments';
    protected $primaryKey = 'id_punishment';
    protected $fillable = [
        'uuid_punishment',
        'punishment',
        'image_punishment',
        'status'
    ];

    protected $searchableColumn = [
        'id_punishment',
        'uuid_punishment',
        'punishment',
        'image_punishment',
        'status'
    ];

    protected $searchableColumnView = [
        'id_punishment',
        'uuid_punishment',
        'punishment',
        'image_punishment',
        'status'
    ];

    protected $orderBy = [
        'by' => 'punishment',
        'order' => 'asc'
    ];

    /**
     * Get Searchable Column (table)
     *
     * @return array
     */
    public function getSearchableColumn()
    {
        return $this->searchableColumn;
    }

    /**
     * Get Searchable Column (if use View)
     *
     * @return array
     */
    public function getSearchableColumnView()
    {
        return $this->searchableColumnView;
    }

    public function getOrderBy()
    {
        return $this->orderBy;
    }
}
