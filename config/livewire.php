<?php

return [

    'temporary_file_upload' => [
        'enabled' => true,
        'storage_disk' => env('FILESYSTEM_DISK','public'), 
        'rules' => null,
        'directory' => 'livewire-tmp',
        'middleware' => null,
        'preview_mimes' => ['png', 'gif', 'jpeg', 'jpg'],
    ],

];
