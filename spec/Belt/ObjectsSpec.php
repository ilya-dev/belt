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

    function it_can_determine_whether_a_value_is_an_instance_of_DateTime()
    {
        $this->isDate(new \stdClass)->shouldBe(false);

        $this->isDate(new \DateTime)->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_a_float_or_an_integer()
    {
        $this->isNumber([])->shouldBe(false);

        $this->isNumber(-89)->shouldBe(true);

        $this->isNumber(34.789)->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_boolean()
    {
        $this->isBoolean(43)->shouldBe(false);

        $this->isBoolean(false)->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_a_string()
    {
        $this->isString(null)->shouldBe(false);

        $this->isString('foo')->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_a_closure()
    {
        $this->isFunction(new \stdClass)->shouldBe(false);

        $this->isFunction(function() {})->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_an_object()
    {
        $this->isObject(3.14)->shouldBe(false);

        $this->isObject(new \stdClass)->shouldBe(true);
    }

    function it_can_compare_two_values_strictly()
    {
        $this->isEqual(null, false)->shouldBe(false);

        $this->isEqual('foo', 'foo')->shouldBe(true);
    }

    function it_can_determine_whether_a_value_is_empty()
    {
        $this->isEmpty(true)->shouldBe(false);

        $this->isEmpty(null)->shouldBe(true);
    }

}

class DummyTraversable implements \IteratorAggregate {

    public function getIterator() {}

}

