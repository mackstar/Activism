<?php

namespace Mackstar\Activism\Test\Mocks\Adapters;

use Mackstar\Activism\Adapters\Memory;

class MemoryMock extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        Config::add('all', 'default', array('adapter' => 'memory'));
    }

    public function testThatCallingCreateCreatesAnInstanceOfSelf() {
        $user = User::create(array('name' => 'Richard'));
        $this->assertTrue($user instanceof User);
    }

    public function testThatTheParametersOfSelfAreThoseAdded() {
        $user = User::create(array('name' => 'Richard'));
        $this->assertEquals($user->getName(), 'Richard');
    }
}