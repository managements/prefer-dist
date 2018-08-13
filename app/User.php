<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'first_name', 'last_name', 'tel', 'dtn',
        'sold', 'range', 'limit',
        'status_id', 'category_id', 'city_id', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function buys()
    {
        return $this->hasMany(Buy::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function planings()
    {
        return $this->hasMany(Planing::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function notes()
    {
        return $this->hasMany(Notification::class);
    }

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class);
    }
}
