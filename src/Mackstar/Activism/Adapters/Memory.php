<?php

namespace Mackstar\Activism\Adapters;

class Memory implements AdapterInterface
{
    protected $_data;
    
    protected $_config;
    
    public function __construct($config) {
        $this->_config = $config;
    }
    
    public function read($array) {
    }
    
    public function write($array) {
        $key = $this->_key;
        if (!isset($array[$key]) || !$array[$key]) {
            $array[$key] = new Id;
        }
        $this->_data[$array[$key]] = $array;
    }
    
    public function remove($array) {
        
    }
    
    public function update($array) {
        
    }
}