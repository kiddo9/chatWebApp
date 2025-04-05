<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notification.{receiverId}', function ($user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});

