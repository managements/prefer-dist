<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spent extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cash', 'freeze', 'finance_id'
    ];

    public function buys()
    {
        return $this->hasMany(Buy::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function finance()
    {
        return $this->belongsTo(Finance::class);
    }

    public function amortizations()
    {
        return $this->hasMany(Amortization::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function Withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }
}
