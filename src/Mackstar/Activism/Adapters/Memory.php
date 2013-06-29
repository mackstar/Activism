<?php

namespace Mackstar\Activism\Adapters;

use Mackstar\Activism\Utilities\Security;

class Memory extends AdapterBase implements AdapterInterface
{
    protected $_data;
    
    protected $_config;
    
    public function read($array = null) {
        $class = get_called_class();
        $key = $this->_config['key'];
        if (isset($array['key'])) {
            return $this->_data[$class][$array['key']];
        }
        return $this->_data[$class];
    }
    
    public function write($array) {
        $class = get_called_class();
        $key = $this->_config['key'];
        if (!isset($array[$key]) || !$array[$key]) {
            $array[$key] = Security::uuid();
        }
        $this->_data[$class][$array[$key]] = $array;
        return $array;
    }
    
    public function remove($array) {
        
    }
    
    public function update($array) {
        
    }
}