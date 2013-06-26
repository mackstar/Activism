<?php

namespace Mackstar\Activism\Base;

class Model extends \Pimple
{
    protected static $instance;
    
    protected static $config;
    
    public function __call($method, $args)
    {
        var_dump($method);
        exit;
    }
    
    public static function config($config = 'default') {
        if (isset($this->_config)) {
            $config = $this->_config;
        }
    }
    
    protected static function setUp() {
        $class = get_called_class();
        if (!self::$instance) {
            self::$instance = new $class;
        }
        if ($config = Config::get()) {
            self::$instance->setConfig($config);
        }
    }
    
    public function setConfig($config) {
        $this->_config['key'] = 'id';
        if (isset($this->_key)) {
            $this->_config['key'] = $this->_key;
        }
        $config = array_merge($this->_config, $config);
        $adapter = $config['adapter'];
        if (strpos($adapter, '\\') === false) {
            $adapter = 'Mackstar\\Activism\\Adapters\\' . $adapter;
        }
        $this['adapter'] = new $adapter($config);
    }
    
    
    public function toJson()
    {
        
    }
    
    public function getAdapter()
    {
        return $this['adapter'];
    }
    
    public function shema()
    {

    }

    public static function create($parameters)
    {
        self::setUp();
        $instance = self::$instance;
        $instance->getAdapter()->write($parameters);
        return $instance;
    }
    

}