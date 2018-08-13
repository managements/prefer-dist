<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function categories()
    {
        return $this->belongsToMany(Authorize::class,'authorize_category','authorize_id','category_id');
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}
