<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BeltSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Belt');
    }

    function it_returns_all_modules()
    {
        $this->getModules()->shouldBeArray();

        $this->getModules()->shouldHaveCount(5);
    }

    function it_loads_a_module()
    {
        $this->load('Belt\Collections')->shouldHaveType('Belt\Collections');

        $this->shouldThrow('UnexpectedValueException')->duringLoad('fsdwfwgwa');

        $this->load('foo', new \stdClass)->shouldHaveType('stdClass');
    }

    function it_determines_whether_the_module_was_loaded()
    {
        $this->isLoaded('foo')->shouldBe(false);

        $this->load('foo', new \stdClass);

        $this->isLoaded('foo')->shouldBe(true);
    }

    function it_loads_an_instance_and_returns_it()
    {
        $this->load('foo', new \stdClass);

        $this->getInstance('foo')->shouldHaveType('stdClass');

        $this->shouldThrow('UnexpectedValueException')->duringGetInstance('bar');
    }

    function it_determines_whether_the_object_has_the_method()
    {
        $instance = new DummyMethods2;

        $this->hasMethod($instance, 'foo')->shouldBe(true);

        $this->hasMethod($instance, 'bar')->shouldBe(false);
    }

    function it_runs_a_method_and_returns_the_output()
    {
        $this->load('bar', new DummyMethods2);

        $this->run('foo', ['baz'])->shouldBe('baz');
    }

    function it_determines_whether_the_module_exists()
    {
        $this->hasModule('foobar')->shouldBe(false);

        $this->addModule('foobar');

        $this->hasModule('foobar')->shouldBe(true);
    }

}

class DummyMethods2 {

    public function foo($var = 'wow')
    {
        return $var;
    }

}

