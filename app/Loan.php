<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cash', 'freeze', 'date', 'join', 'description', 'gain_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gain()
    {
        return $this->belongsTo(Gain::class);
    }

    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }
}
