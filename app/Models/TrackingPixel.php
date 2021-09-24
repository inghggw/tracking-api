<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingPixel extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tracking_pixel';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'hash',
        'opens',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
