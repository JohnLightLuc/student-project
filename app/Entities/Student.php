<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Student extends Entity
{
    protected $attributes = [
        'id'         => null,
        'first_name'  => null,
        'last_name'  => null,
        'email'      => null,
        'photo_url'   => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'id'                 => 'integer',
        'first_name'         => 'string',
        'last_name'          => 'string',
        'email'              => 'string',
        'photo_url'          => 'string'
    ];
}