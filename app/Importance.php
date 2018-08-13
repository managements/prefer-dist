<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Importance extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function planings()
    {
        return $this->hasMany(Planing::class);
    }
}
