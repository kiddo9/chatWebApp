<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class friendRequest extends Model
{
    //
    protected $table = 'friendRequest';
    
    protected $fillable = [
        'requestId',
        'senderId',
        'receiverId',
        'request_status',
    ];
}
