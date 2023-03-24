<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Weather extends Model
{
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'city',
        'temperature',
        'wind',
        'description',
        'created_at',
        'updated_at',
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->id = Str::uuid();
        });
    }
}
