<?php

namespace Mackstar\Activism\Base;

class Model extends \Pimple
{
    protected $adapter;
    

    
    public function __construct()
    {
        $this['results'] = new Results;
        $this['data'] = new Object;
        $this['adapter'] = new Results;
    }
    
    public function __set()
    {
        
    }
    
    public function toJson()
    {
        
    }
    
    public function shema()
    {

    }

    public function create($parameters)
    {
    }

}