<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArraysSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Arrays');
    }

    function it_can_return_the_first_n_elements()
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->first($elements)->shouldBe(2);

        $this->first($elements, 3)->shouldBe([2, 3, 4]);
    }

}

