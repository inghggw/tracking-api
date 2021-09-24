<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingUrl extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tracking_url';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'hash',
        'opens',
        'url',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
