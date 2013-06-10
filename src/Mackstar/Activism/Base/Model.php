<?php

namespace Mackstar\Activism\Base;

class Model extends \Pimple
{
    protected static $instance;
    
    protected static $config;
    
    public function __construct()
    {
        //$this['results'] = new Results;
        //$this['adapter'] = new Adapter;
        //$this['data'] = new Object;
    }
    
    public function __set($method, $args)
    {
        
    }
    
    public function __get($method, $args)
    {
        
    }
    
    public static function config($config = 'default') {
        if (isset($this->_config)) {
            $config = $this->_config;
        }
    }
    
    public static function setConfig($config = 'default') {
        if (isset($this->_config)) {
            $config = $this->_config;
        }
    }
    
    protected static function setUp() {
        $class = get_called_class();
        if (!self::$instance) {
            self::$instance = new $class;
        }
        $config = 
        if (static::$config) {
            self::$instance->setConfig();
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