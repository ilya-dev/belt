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

    function it_returns_true_if_any_value_passes_the_truth_test()
    {
        $collection = [17, 83, 61, 57, 14, 95];

        $iterator = function($number)
        {
            return 0 == ($number % 2);
        };

        $this->any($collection, $iterator)->shouldReturn(true);

        $this->any([67, 45], $iterator)->shouldReturn(false);
    }

    function it_can_extract_an_array_of_values_associated_with_a_given_key()
    {
        $collection = [
            ['name' => 'Jack'], ['name' => 'Ian'], ['name' => 'Glen'],
        ];

        $this->pluck($collection, 'name')->shouldBe(['Jack', 'Ian', 'Glen']);

        $collection[1] = []; // break the structure

        $this->pluck($collection, 'name')->shouldBe(['Jack', 'Glen']);
    }

    function it_can_iterate_through_a_collection()
    {
        $collection = [
            'foo', 'bar', 'baz'
        ];

        $iterator = function($key, $value) use($collection)
        {
            if ($collection[$key] != $value)
            {
                throw new \LogicException();
            }
        };

        $this->each($collection, $iterator);
    }

    function it_can_calculate_the_size_of_a_value()
    {
        $this->size([1, 2, 3])->shouldBe(3);

        $this->size(false)->shouldBe(null);

        $this->size(new DummyCountable)->shouldBe(4);
    }

    function it_can_shuffle_an_array()
    {
        $collection = [15, 52, 47, 74, 27, 95, 32, 82];

        $this->shuffle($collection)->shouldNotBe($collection);
    }

}

class DummyCountable implements \Countable {

    public function count()
    {
        return 4;
    }

}

