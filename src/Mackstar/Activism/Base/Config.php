<?php

namespace Mackstar\Activism\Base;

class Config
{
    protected static $conf = array();

    /**
     * Adds the specified connection
     *
     * @param $alias string
     * @param $environment string
     * @param $options array
     * @return void
     */
    public static function add($environment, $alias, $options) {
        if (!isset(static::$conf[$alias])) {
            static::$conf[$alias] = array();
        }
        if ($environment == 'all') {
            static::$conf[$alias] = $options;
            return;
        }
        static::$conf[$alias][$environment] = $options;
    }
    
    
    /**
     * Retrieves the specified connection
     *
     * @param $alias string
     * @param $environment string
     * @return array
     */
    public static function get($alias = 'default', $environment = 'all') {
        if ($environment == 'all' || !isset(static::$conf[$alias])) {
            return static::$conf[$alias];
        }
        return static::$conf[$alias][$environment];
    }
    
    public static function setEnvironment($environment) {
        static::$environment = $environment;
    }
    
    public static function setConnection($connection) {
        static::$environment = $environment;
    }
    
    /**
     * Clears connections, mainly for use in testing
     *
     * @return void
     */
    public static function clear() {
        static::$conf = array();
    }
}