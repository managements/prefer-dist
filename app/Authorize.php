<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorize extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'authorize'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'authorize_category','category_id','authorize_id');
    }
}
