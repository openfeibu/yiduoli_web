<?php

return [

/*
 * Modules .
 */
    'modules'  => ['subsidiary'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'subsidiary'     => [
        'model'        => 'App\Models\subsidiary',
        'table'        => 'subsidiaries',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['name', 'url', 'image', 'order','content'],
        'translate'    => ['name', 'url', 'image', 'order','content'],
        'upload_folder' => '/subsidiary',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],

];
