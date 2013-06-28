<?php

namespace Mackstar\Activism\Base;

class Result implements \ArrayAccess, \Iterator, \Countable
{

    protected $_data = array();

    public function __construct($data) {
        foreach ($data as $row) {
            $this->_data[] = $row;
        }
    }
    public function offsetSet($offset, $row) {
        if (is_null($offset)) {
            $this->_data[] = $row;
        } else {
            $this->_data[$offset] = $row;
        }
    }
    public function offsetExists($offset) {
        return isset($this->_data[$offset]);
    }
    public function offsetUnset($offset) {
        unset($this->_data[$offset]);
    }
    public function offsetGet($offset) {
        return isset($this->_data[$offset]) ? $this->_data[$offset] : null;
    }
    
    public function key() {
        
    }
    
    public function valid() {
        
    }
    
    public function rewind() {
        
    }
    
    public function count() {
        return count($this->_data);
    }
    
    public function current() {
        
    }
    
    public function next() {
        
    }
}