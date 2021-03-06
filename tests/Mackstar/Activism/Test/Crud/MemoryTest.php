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
    
    public function testUpdate() {
        $user = User::create(['name' => 'Richard']);
        $user->update(['name' => 'Mackstar']);
        $result = User::find($user->getId());
        $this->assertEquals($result->getName(),'Mackstar');
    }
    
    public function testReturnsNullWhenDoesntExist() {
        $user = User::find('idontexist');
        $this->assertEquals($user,null);
    }
    
    public function testDelete() {
        $user = User::create(['name' => 'Richard']);
        $this->assertTrue($user->remove());
    }
    
    public function testDeleteReallyIsDeleted() {
        $user = User::create(['name' => 'Richard']);
        $id = $user->getId();
        $user->remove();
        $this->assertEquals(User::find($id), null);
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