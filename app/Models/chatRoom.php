<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chatRoom extends Model
{
    //
    protected $fillable = [
        'roomId',
        'user_id1',
        'user_id2',
    ];
}
