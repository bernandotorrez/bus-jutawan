<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    use HasFactory;

    protected $table = 'tbl_rewards';
    protected $primaryKey = 'id_reward';
    protected $fillable = [
        'uuid_reward',
        'reward',
        'image_reward',
        'status'
    ];

    protected $searchableColumn = [
        'id_reward',
        'uuid_reward',
        'reward',
        'image_reward',
        'status'
    ];

    protected $searchableColumnView = [
        'id_reward',
        'uuid_reward',
        'reward',
        'image_reward',
        'status'
    ];

    protected $orderBy = [
        'by' => 'reward',
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
