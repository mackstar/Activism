<?php

namespace Mackstar\Activism\Test\Crud;

use Mackstar\Activism\Test\Mocks\Models\User;
use Mackstar\Activism\Base\Config;


class MemoryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        Config::add('all', 'default', array('adapter' => 'memory'));
    }
    
    public function tearDown() {
        User::clear();
    }

    public function testThatCallingCreateCreatesAnInstanceOfSelf() {
        $user = User::create(array('name' => 'Richard'));
        $this->assertTrue($user instanceof User);
    }

    public function testThatTheParametersOfSelfAreThoseAdded() {
        $user = User::create(array('name' => 'Richard'));
        $this->assertEquals($user->getName(), 'Richard');
    }
    
    public function testIdIsCreated() {
        $user = User::create(array('name' => 'Richard'));
        $this->assertEquals(strlen($user->getId()),36);
    }
    
    public function testSimpleFind() {
        $user = User::create(array('name' => 'Richard'));
        $result = User::find($user->getId());
        $this->assertEquals(strlen($result->getId()),36);
    }

    // public function testClearDatabase() {
    //     $user = User::create(array('name' => 'Richard'));
    //     
    // }
}