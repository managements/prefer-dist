<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'sold', 'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function spent()
    {
        return $this->hasOne(Spent::class);
    }

    public function gain()
    {
        return $this->hasOne(Gain::class);
    }
}
