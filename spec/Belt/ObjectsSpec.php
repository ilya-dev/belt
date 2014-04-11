<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ObjectsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Objects');
    }

    function it_can_determine_whether_a_value_is_null()
    {
        $this->isNull(18)->shouldBe(false);

        $this->isNull(null)->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_an_array()
    {
        $this->isArray(null)->shouldBe(false);

        $this->isArray([])->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_traversable()
    {
        $this->isTraversable([])->shouldBe(true);

        $this->isTraversable(new DummyTraversable)->shouldBe(true);

        $this->isTraversable('string')->shouldBe(false);
    }

}

class DummyTraversable implements \IteratorAggregate {

    public function getIterator() {}

}

