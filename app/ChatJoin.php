<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatJoin extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'join', 'chat_id'
    ];
}
