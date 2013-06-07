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
}
?>