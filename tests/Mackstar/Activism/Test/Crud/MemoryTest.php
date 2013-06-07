<?php

namespace Mackstar\Activism\Test\Crud;

use  Mackstar\Activism\Test\Models\User;
use Mackstar\Activism\Base\Config;


class MemoryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
        Config::add('all', 'default', array('adapter' => 'memory'));
    }

    public function testThatSaveWorksCorrectly() {
        User::create(array(''));
    }
}