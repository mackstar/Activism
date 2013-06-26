<?php

namespace Mackstar\Activism\Adapters;

class AdapterBase
{
    protected $_key;
    
    public function __construct() {}

    public function setKey($key) {
        $this->_key = $key;
    }


}