<?php

namespace Mackstar\Activism\Test\Mocks\Adapters;

use Mackstar\Activism\Adapters\Memory;

class MemoryMock extends Memory
{
    public function getData() {
        return $this->_data;
    }
    
    public function setData($data) {
        return $this->_data;
    }
    
    public function setConfig($config) {
        return $this->_config = $config;
    }
}