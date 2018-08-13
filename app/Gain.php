<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gain extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cash', 'freeze', 'finance_id'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function finance()
    {
        return $this->belongsTo(Finance::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
