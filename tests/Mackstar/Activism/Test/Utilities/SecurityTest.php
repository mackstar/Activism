<?php

namespace Mackstar\Activism\Test\Utilities;

use Mackstar\Activism\Utilities\Security;

class SecurityTest extends \PHPUnit_Framework_TestCase
{
    public function testUuidReturnsValue() {
        $this->assertEquals(strlen(Security::uuid()), 36);
    }
}