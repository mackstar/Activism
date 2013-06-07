<?php

namespace Mackstar\Activism\Test\Base;

use Mackstar\Activism\Base\Config;

class CongfigTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        Config::clear();
    }
    
    public function testCanAddConfigWithDefaults() {
        $config = array(
            'dbname' => 'mydb',
            'user' => 'user',
            'password' => 'secret',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );
        Config::add('all', 'default', $config);
        $result = Config::get();
        $this->assertEquals($result, $config);
    }
    
    public function testCanAddMultipleConfigs() {
        $config = array(
            'dbname' => 'mydb',
            'user' => 'user',
            'password' => 'secret',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );
        Config::add('all', 'default', $config);
        Config::add('all', 'new', $config);
        $result = Config::get('new');
        $this->assertEquals($result, $config);
    }
    
    public function testCanAddEnvironmentalConfigs() {
        $config = array(
            'dbname' => 'testdb',
            'user' => 'user',
            'password' => 'secret',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );
        Config::add('test', 'default', $config);
        $config['dbname'] = 'livedb';
        Config::add('live', 'default', $config);
        $result = Config::get('default', 'test');
        $this->assertEquals('testdb', $result['dbname']);
        $result = Config::get('default', 'live');
        $this->assertEquals('livedb', $result['dbname']);
    }
}
?>