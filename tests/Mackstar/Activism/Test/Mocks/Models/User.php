<?php

namespace Mackstar\Activism\Test\Mocks\Models;

class User extends \Mackstar\Activism\Base\Model
{
    protected $schema = [
        'name' => ['type' => 'varchar', 'length' => 100]
    ];
    
    
}