<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cash', 'freeze', 'date', 'description', 'join', 'tva', 'taxes',
        'trade_id', 'user_id', 'spent_id'
    ];

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spent()
    {
        return $this->belongsTo(Spent::class);
    }
}
