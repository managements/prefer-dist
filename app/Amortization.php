<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amortization extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cash', 'freeze', 'date', 'description',
        'spent_id', 'user_id'
    ];

    public function spent()
    {
        return $this->belongsTo(Spent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
