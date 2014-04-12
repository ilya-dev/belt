<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BeltSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Belt');
    }

    function it_returns_the_list_of_the_modules()
    {
        $this->getModules()->shouldBeArray();

        $this->getModules()->shouldHaveCount(5);
    }

}

