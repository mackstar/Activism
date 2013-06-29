<?php

namespace Mackstar\Activism\Adapters;

use Mackstar\Activism\Utilities\Security;

class Memory extends AdapterBase implements AdapterInterface
{
    protected $_data;
    
    protected $_class;
    
    public function __construct($config) {
        $this->_class = $config['called_class'];
        parent::__construct($config);
    }

    public function read($array = null) {
        $key = $this->_config['key'];
        if (isset($array['key'])) {
            return $this->_data[$this->_class][$array['key']];
        }
        return $this->_data[$this->_class];
    }
    
    public function write($array) {
        $key = $this->_config['key'];
        if (!isset($array[$key]) || !$array[$key]) {
            $array[$key] = Security::uuid();
        }
        $this->_data[$this->_class][$array[$key]] = $array;
        return $array;
    }
    
    public function remove($array) {
        
    }
    
    public function update($array) {
        
    }
}