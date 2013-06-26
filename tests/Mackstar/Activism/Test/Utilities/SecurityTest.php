<?php

namespace Mackstar\Activism\Test\Utilities;

use Mackstar\Activism\Utilities\Security;

class SecurityTest extends \PHPUnit_Framework_TestCase
{
    public function testUuidReturnsValue() {
        
        var_dump(Security::uuid());
        
        exit;
        $this->assertEquals('Richard', Inflector::camelCase('richard'));
    }
}