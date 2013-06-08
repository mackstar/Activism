<?php

namespace Mackstar\Activism\Test\Crud;

use Mackstar\Activism\Test\Mocks\Models\User;
use Mackstar\Activism\Base\Config;


class MemoryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        Config::add('all', 'default', array('adapter' => 'memory'));
    }

    public function testThatCallingCreateCreatesAnInstanceOfSelf() {
        $user = User::create(array(''));
        $this->assertTrue($user instanceof User);
    }
}