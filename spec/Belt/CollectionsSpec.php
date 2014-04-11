<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Collections');
    }

    function it_can_transform_a_value_to_an_array()
    {
        $this->toArray(['foo'])->shouldBe(['foo']);

        $instance = new \stdClass;

        $instance->foo = 'bar';

        $this->toArray($instance)->shouldBe(['foo' => 'bar']);
    }

}

