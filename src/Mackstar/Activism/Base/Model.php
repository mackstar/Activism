<?php

namespace Mackstar\Activism\Base;

class Model extends \Pimple
{
    protected static $instance;
    
    protected static $config;
    
    public function __call($method, $args)
    {
        switch(substr($method, 0, 3)) {
            case 'get':
                return $this['object']->get(substr($method, 3));
                break;
        }
    }
    
    static function clear() {
        static::$instance = null;
        static::$config = null;
    }
    
    public static function instance() {
        return static::$instance;
    }
    
    
    public static function config($config = 'default') {
        if (isset($this->_config)) {
            $config = $this->_config;
        }
    }
    
    protected static function setUp() {
        $class = get_called_class();
        if (!static::$instance) {
            static::$instance = new $class;
        }
        if ($config = Config::get()) {
            static::$instance->setConfig($config);
        }
    }
    
    public function setConfig($config) {
        $this->_config['key'] = 'id';
        if (isset($this->_key)) {
            $this->_config['key'] = $this->_key;
        }
        $config = array_merge($this->_config, $config);
        if (isset($this['adapter'])) {
            return;
        }
        $adapter = $config['adapter'];
        if (strpos($adapter, '\\') === false) {
            $adapter = 'Mackstar\\Activism\\Adapters\\' . $adapter;
        }
        $this['adapter'] = new $adapter($config);
    }
    
    public static function find($key) {
        static::setUp();
        $instance = self::$instance;
        $data = $instance->getAdapter()->read(array('key' => $key));
        $instance->setData($data);
        return $instance;
    }
    
    public static function findAll() {
        static::setUp();
        $instance = self::$instance;
        $data = $instance->getAdapter()->read();
        return self::setResultSet($data);
    }
    
    public function toJson()
    {
        
    }
    
    public function getAdapter()
    {
        return $this['adapter'];
    }
    
    public function setData($data)
    {
        $this['object'] = new Object($data);
    }
    
    public static function setResultSet($data) {
        $results = array();
        foreach ($data as $row) {
            $result = self::$instance->setData($row);
            $results[] = $result;
        }
        return new Result($results);
    }

    public static function create($parameters)
    {
        self::setUp();
        $data = self::$instance->getAdapter()->write($parameters);
        self::$instance->setData($data);
        return self::$instance;
    }
    

}