<?php

namespace Mackstar\Activism\Base;

class Model extends \Pimple
{
    protected static $instance;
    
    public function __construct()
    {
        //$this['results'] = new Results;
        //$this['data'] = new Object;
    }
    
    public function __set($method, $args)
    {
        
    }
    
    protected static function setUp() {
        $class = get_called_class();
        if (!self::$instance) {
            self::$instance = new $class;
        }
    }
    
    public function toJson()
    {
        
    }
    
    public function shema()
    {

    }

    public static function create($parameters)
    {
        self::setUp();
        return self::$instance;
    }
    

}