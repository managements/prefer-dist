<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
         'date', 'done', 'project_id', 'importance_id', 'user_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function importance()
    {
        return $this->belongsTo(Importance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
