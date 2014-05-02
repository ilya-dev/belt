<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;

class ObjectsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Objects');
    }

    function it_determines_whether_the_value_is_null()
    {
        $this->isNull(18)->shouldBe(false);

        $this->isNull(null)->shouldBe(true);
    }

    function it_determines_whether_the_value_is_an_array()
    {
        $this->isArray(null)->shouldBe(false);

        $this->isArray([])->shouldBe(true);
    }

    function it_determines_whether_the_value_is_traversable()
    {
        $this->isTraversable([])->shouldBe(true);

        $this->isTraversable(new DummyTraversable)->shouldBe(true);

        $this->isTraversable('string')->shouldBe(false);
    }

    function it_determines_whether_the_value_is_an_instance_of_DateTime()
    {
        $this->isDate(new \stdClass)->shouldBe(false);

        $this->isDate(new \DateTime)->shouldBe(true);
    }

    function it_determines_whether_the_value_is_a_float_or_an_integer()
    {
        $this->isNumber([])->shouldBe(false);

        $this->isNumber(-89)->shouldBe(true);

        $this->isNumber(34.789)->shouldBe(true);
    }

    function it_determines_whether_the_value_is_boolean()
    {
        $this->isBoolean(43)->shouldBe(false);

        $this->isBoolean(false)->shouldBe(true);
    }

    function it_determines_whether_the_value_is_a_string()
    {
        $this->isString(null)->shouldBe(false);

        $this->isString('foo')->shouldBe(true);
    }

    function it_determines_whether_the_value_is_a_closure()
    {
        $this->isFunction(new \stdClass)->shouldBe(false);

        $this->isFunction(function() {})->shouldBe(true);
    }

    function it_determines_whether_the_value_is_an_object()
    {
        $this->isObject(3.14)->shouldBe(false);

        $this->isObject(new \stdClass)->shouldBe(true);
    }

    function it_compares_two_values_in_strict_mode()
    {
        $this->isEqual(null, false)->shouldBe(false);

        $this->isEqual('foo', 'foo')->shouldBe(true);
    }

    function it_determines_whether_the_value_is_empty()
    {
        $this->isEmpty(true)->shouldBe(false);

        $this->isEmpty(null)->shouldBe(true);
    }

    function it_returns_the_names_of_all_public_methods()
    {
        $this->methods(new DummyMethods)->shouldBe(['foo', 'bar']);
    }

    function it_returns_a_copy_of_the_value()
    {
        $value = ['just', 'a', 'dumb', 'array'];

        $this->copy($value)->shouldBeEqualTo($value);

        $this->copy($instance = new \stdClass)->shouldNotBeEqualTo($instance);

        $this->copy($instance)->shouldBeLike($instance);
    }

    function it_makes_a_copy_of_all_properties()
    {
        $source = (object) ['foo' => 'bar', 'baz' => 'wow'];

        $destination = new \stdClass;

        $this->extend($source, $destination)->shouldBeLike($source);
    }

    function it_fills_in_any_missing_values_using_the_defaults()
    {
        $object = (object) ['foo' => 'bar'];

        $defaults = [(object) ['baz' => 'wow'], (object) ['foo' => 'such']];

        $this->defaults($object, $defaults)->shouldBeLike((object)[
            'foo' => 'bar',
            'baz' => 'wow',
        ]);
    }

    function it_returns_the_object_keys()
    {
        $object = (object) ['foo' => 2, 'bar' => 3, 'baz' => 4];

        $this->keys($object)->shouldBe(['foo', 'bar', 'baz']);
    }

    function it_returns_the_object_values()
    {
        $object = (object) ['foo' => 2, 'bar' => 3, 'baz' => 4];

        $this->values($object)->shouldBe([2, 3, 4]);
    }

    function it_determines_whether_the_object_has_a_key()
    {
        $object = (object) ['foo' => 'bar'];

        $this->has($object, 'foo')->shouldBe(true);

        $this->has($object, 'baz')->shouldBe(false);
    }

    function it_invokes_a_closure_on_the_object_and_then_returns_it()
    {
        $closure = function($object)
        {
            $object->foo = 'bar';
        };

        $this->apply($object = new \stdClass, $closure)->shouldBe($object);
    }

}

class DummyTraversable implements \IteratorAggregate {

    public function getIterator() {}

}

class DummyMethods {

    public function foo() {}

    public function bar() {}

    private function baz() {}

}

