<?php

namespace Mackstar\Activism\Test\Models;

class User extends \Mackstar\Activism\Base\Model
{
    protected $schema = [
        'name' => ['type' => 'varchar', 'length' => 100];
    ];
}