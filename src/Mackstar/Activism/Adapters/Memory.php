<?php

namespace Mackstar\Activism\Adapters;

use Mackstar\Activism\Utilities\Security;

class Memory extends AdapterBase implements AdapterInterface
{
    protected $_data;
    
    protected $_config;
    
    public function read($array = null) {
        $key = $this->_config['key'];
        if (isset($array['key'])) {
            return $this->_data[$array['key']];
        }
        return $this->_data;
    }
    
    public function write($array) {
        $key = $this->_config['key'];
        if (!isset($array[$key]) || !$array[$key]) {
            $array[$key] = Security::uuid();
        }
        $this->_data[$array[$key]] = $array;
        return $array;
    }
    
    public function remove($array) {
        
    }
    
    public function update($array) {
        
    }
}