<?php

namespace Mackstar\Activism\Test\Crud;

use Mackstar\Activism\Test\Mocks\Models\User;
use Mackstar\Activism\Base\Config;
use Mackstar\Activism\Base\Result;


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

    public function testFindAll() {
        $user = User::create(array('name' => 'Richard'));
        $user = User::create(array('name' => 'Akihito'));
        $results = User::findAll();
        $this->assertEquals(count($results),2);
        $this->assertTrue($results instanceof Result);
        $this->assertTrue($results[0] instanceof User);
    }
}