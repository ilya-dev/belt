<?php
namespace Belt\Tests;

use Belt\Utilities;
use PHPUnit_Framework_TestCase;

class UtilitiesTest extends PHPUnit_Framework_TestCase
{
    public function testRandomAlphanum()
    {
        $string = Utilities::random(5000);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[a-zA-Z0-9]*$/", $string);
    }

    public function testRandomAlphanumUppercase()
    {
        $string = Utilities::random(5000, Utilities::RANDOM_TYPE_ALNUM, true);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[A-Z0-9]*$/", $string);
    }

    public function testRandomAlpha()
    {
        $string = Utilities::random(5000, Utilities::RANDOM_TYPE_ALPHA);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[a-zA-Z]*$/", $string);
    }

    public function testRandomAlphaUppercase()
    {
        $string = Utilities::random(5000, Utilities::RANDOM_TYPE_ALPHA, true);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[A-Z]*$/", $string);
    }

    public function testRandomHexa()
    {
        $string = Utilities::random(5000, Utilities::RANDOM_TYPE_HEXA);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[A-F0-9]*$/", $string);
    }

    public function testRandomNumeric()
    {
        $string = Utilities::random(5000, Utilities::RANDOM_TYPE_NUMERIC);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[0-9]*$/", $string);
    }
}