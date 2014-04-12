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

}

