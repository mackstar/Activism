<?php

namespace Mackstar\Activism\Base;

use Mackstar\Activism\Utilities\Inflector;

class Object
{
    protected $_data;
    
    public function __construct($data) {
        $this->_data = $data;
    }
    
    public function get($property) {
        $property = Inflector::underscore($property);
        if (!isset($this->_data[$property])) {
            throw \Exception('Property not found');
        }
        return $this->_data[$property];
    }
    
    public function getData() {
        return $this->_data;
    }
}