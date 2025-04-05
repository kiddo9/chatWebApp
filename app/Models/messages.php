<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
    protected $fillable = [
        'chatRoomId',
        'senderId',
        'receiverId',
        'message',
        'seen'
    ];
}
