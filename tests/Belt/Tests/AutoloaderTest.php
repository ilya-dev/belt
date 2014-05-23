<?php
namespace Belt\Tests;

use PHPUnit_Framework_TestCase;
use Belt\Autoloader;

class AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        Autoloader::register();
        $this->assertContains(array('Belt\\Autoloader', 'autoload'), spl_autoload_functions());
    }

    public function testAutoload()
    {
        $declared = get_declared_classes();
        $declaredCount = count($declared);
        Autoloader::autoload('Foo');
        $this->assertEquals(
            $declaredCount,
            count(get_declared_classes()),
            'Belt\\Autoloader::autoload() is trying to load classes outside of the Belt namespace'
        );
        Autoloader::autoload('Belt\\Belt');
        $this->assertTrue(
            in_array('Belt\\Belt', get_declared_classes()),
            'Belt\\Autoloader::autoload() failed to autoload the Belt\\Belt class'
        );
    }
}