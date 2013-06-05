<?php

namespace Mackstar\Activism\Adapters;

class AdapterBase
{
    protected $object;
    
    public function setObject() {
        $this->object = $object;
    }
    
    public function schema() {
        if ($this->object->schema()) {
            
        }
    }
    

}