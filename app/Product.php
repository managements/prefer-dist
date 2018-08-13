<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'img', 'name', 'description', 'size', 'qt', 'qt_min', 'value_min', 'value_max', 'ref', 'tva',
        'section_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function productValues()
    {
        return $this->hasMany(ProductValue::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
