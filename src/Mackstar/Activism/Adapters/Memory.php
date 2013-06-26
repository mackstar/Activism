<?php

namespace Mackstar\Activism\Adapters;

class Memory extends AdapterBase implements AdapterInterface
{
    protected $_data;
    
    protected $_config;
    
    /**
     * @var mixed $_key
     * 
     */
    protected $_key;
    
    
    public function __construct($config) {
        $this->_config = $config;
    }
    
    public function read($array) {
    }
    
    public function write($array) {
        if ($this->_key) {
            $key = $this->_key;
        }
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