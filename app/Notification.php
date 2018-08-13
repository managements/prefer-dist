<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'notification', 'read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
