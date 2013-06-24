<?php

namespace Mackstar\Activism\Test\Mocks\Models;

class User extends \Mackstar\Activism\Base\Model
{
    protected $_schema = [
        'name' => ['type' => 'varchar', 'length' => 100]
    ];
    
    protected $_config = array(
        'adapter' => 'Memory'
    );
    
    protected $_key = 'id';
    
    
}