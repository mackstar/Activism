<?php

namespace Mackstar\Activism\Utilities;

use Mackstar\Activism\Adapter\Memory;

class InflectorTest extends \PHPUnit_Framework_TestCase
{
    public function testCamelCasingSingleWord() {
        $this->assertEquals('Richard', Inflector::camelCase('richard'));
    }

    public function testCamelCasingUndescoredWord() {
        $this->assertEquals('LastModified', Inflector::camelCase('last_modified'));
    }

    public function testCamelCasingDashedWord() {
        $this->assertEquals('LastModified', Inflector::camelCase('last-modified'));
    }
    
    public function testCamelCasingSpacedWord() {
        $this->assertEquals('LastModified', Inflector::camelCase('last modified'));
    }
    
    public function testPreviouslyCamelCasedWord() {
        $this->assertEquals('LastModified', Inflector::camelCase('LastModified'));
    }
}