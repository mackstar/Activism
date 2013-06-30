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
            if (!isset($this->_data[$this->_class][$array['key']])) {
                return null;
            }
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
    
    /**
     * Delete 
     *
     * @param array $data
     * @return boolean
     */
    public function remove($data) {
        $key = $this->_config['key'];
        if (isset($this->_data[$this->_class][$data[$key]])) {
            unset($this->_data[$this->_class][$data[$key]]);
            return true;
        }
        return false;
    }
    
    public function update($data, $updates) {
        $key = $this->_config['key'];
        $array = array_merge($data, $updates);
        $this->_data[$this->_class][$data[$key]] = $array;
        $array;
    }
}