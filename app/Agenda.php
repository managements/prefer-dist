<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'note'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
