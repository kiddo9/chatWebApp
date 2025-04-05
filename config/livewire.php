<?php

return [

    'temporary_file_upload' => [
        'enabled' => true,
        'disk' => 'local', // Or 'public' if needed
        'rules' => ['file', 'max:10240'], // 10MB max
        'directory' => 'livewire-tmp',
        'middleware' => ['web', 'throttle:60,1'],
        'preview_mimes' => ['png', 'gif', 'jpeg', 'jpg'],
    ],

];
