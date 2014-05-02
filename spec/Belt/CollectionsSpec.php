<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;

class CollectionsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Collections');
    }

    function it_transforms_the_collection_to_an_array()
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

    function it_extracts_an_array_of_values_associated_with_the_key()
    {
        $collection = [
            ['name' => 'Jack'], ['name' => 'Ian'], ['name' => 'Glen'],
        ];

        $this->pluck($collection, 'name')->shouldBe(['Jack', 'Ian', 'Glen']);

        $collection[1] = [];

        $this->pluck($collection, 'name')->shouldBe(['Jack', 'Glen']);
    }

    function it_iterates_through_a_collection()
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

    function it_calculates_the_size_of_value()
    {
        $this->size([1, 2, 3])->shouldBe(3);

        $this->size(false)->shouldBe(null);

        $this->size(new DummyCountable)->shouldBe(4);
    }

    function it_shuffles_a_collection()
    {
        $collection = [15, 52, 47, 74, 27, 95, 32, 82];

        $this->shuffle($collection)->shouldNotBe($collection);
    }

    function it_maps_through_a_collection()
    {
        $collection = [
            'foo' => 'bar',
            'baz' => 'wow',
        ];

        $iterator = function($key, $value)
        {
            return 'foo' == $key ? null : $value;
        };

        $this->map($collection, $iterator)->shouldBe([
            'foo' => null,
            'baz' => 'wow',
        ]);
    }

    function it_determines_whether_the_collection_contains_a_value()
    {
        $collection = ['foo', false, 42];

        $this->contains($collection, null)->shouldBe(false);

        $this->contains($collection, false)->shouldBe(true);
    }

    function it_runs_a_function_across_all_elements_in_the_collection()
    {
        $collection = [
            '  foo  ', '  bar', 'baz  '
        ];

        $this->invoke($collection, 'trim')->shouldBe(['foo', 'bar', 'baz']);
    }

    function it_determines_whether_all_elements_in_the_collection_pass_the_truth_test()
    {
        $collection = [
            null, false, 0
        ];

        $iterator = function($value)
        {
            return empty($value);
        };

        $this->all($collection, $iterator)->shouldBe(true);

        $collection[] = true;

        $this->all($collection, $iterator)->shouldBe(false);
    }

    function it_runs_a_function_across_the_collection_and_removes_failing_items()
    {
        $collection = [
            2, 3, 4, 5, 6, 7
        ];

        $iterator = function($value)
        {
            return ($value % 2) > 0;
        };

        $this->reject($collection, $iterator)->shouldBe([3, 5, 7]);
    }

    function it_reduces_the_collection_into_a_single_value()
    {
        $collection = [1, 2, 3, 4];

        $iterator = function($latest, $value)
        {
            return $latest + $value;
        };

        $this->reduce($collection, $iterator, 0)->shouldBe(10);
    }

    function it_removes_all_failing_items_from_the_collection()
    {
        $collection = [1, 2, 3, 4];

        $iterator = function($value)
        {
            return 0 == ($value % 2);
        };

        $this->filter($collection, $iterator)->shouldBe([2, 4]);
    }

    function it_sorts_the_collection_in_ascending_order_based_on_iterator_results()
    {
        $collection = [2, 3, 4, 5, 6, 7];

        $iterator = function($number)
        {
            return ($number * -1);
        };

        $this->sortBy($collection, $iterator)->shouldBe([-7, -6, -5, -4, -3, -2]);
    }

    function it_groups_values_in_the_collection_by_the_iterators_return_value()
    {
        $collection = [1, 2, 3, 4, 5];

        $iterator = function($value)
        {
            return 1 == ($value % 2);
        };

        $this->groupBy($collection, $iterator)->shouldBe([
            0 => [2, 4],
            1 => [1, 3, 5],
        ]);
    }

    function it_returns_the_maximum_value_from_the_collection()
    {
        $collection = [2, 67, 7624, 214, 6262, 155, 62];

        $this->max($collection)->shouldBe(7624);
    }

    function it_returns_the_minimum_value_from_the_collection()
    {
        $collection = [67, 7624, 214, 2, 17, 6262, 155, 62];

        $this->min($collection)->shouldBe(2);
    }

}

class DummyCountable implements \Countable {

    public function count()
    {
        return 4;
    }

}

