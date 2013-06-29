<?php

namespace Mackstar\Activism\Test\Adapters;

use Mackstar\Activism\Test\Mocks\Adapters\MemoryMock;

class MemoryTest extends \PHPUnit_Framework_TestCase
{
    public function testWrite() {
        $memory = new MemoryMock(array('key' => 'id', 'called_class' => 'User'));
        $memory->write(array('id' => '1', 'name' => 'Richard'));
        $result = $memory->getData();
        $expected = array('User' => array('1' => array('id' => '1', 'name' => 'Richard')));
        $this->assertEquals($result, $expected);
    }
}