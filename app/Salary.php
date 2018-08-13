<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cash', 'freeze', 'date',
        'post_id', 'spent_id', 'user_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function spent()
    {
        return $this->belongsTo(Spent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
