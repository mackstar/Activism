<?php

namespace Mackstar\Activism\Adapters;

class AdapterBase
{
    protected $_config;
    
    public function __construct($config) {
        $this->_config = $config;
    }

}