<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'img', 'first_name', 'last_name', 'post', 'tel', 'email', 'company_id'
    ];

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
