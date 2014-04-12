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

    function it_can_exclude_the_last_n_elements()
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->initial($elements)->shouldBe([2, 3, 4, 5, 6]);

        $this->initial($elements, 3)->shouldBe([2, 3, 4]);
    }

    function it_can_return_the_rest_of_the_array_elements()
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->rest($elements)->shouldBe([3, 4, 5, 6, 7]);

        $this->rest($elements, 2)->shouldBe([4, 5, 6, 7]);
    }

    function it_can_return_the_last_n_elements()
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->last($elements)->shouldBe(7);

        $this->last($elements, 3)->shouldBe([5, 6, 7]);
    }

    function it_can_remove_falsy_values()
    {
        $elements = [false, 'foo', 0, '', 42];

        $this->pack($elements)->shouldBe(['foo', 42]);
    }

    function it_can_flatten_an_array()
    {
        $elements = ['such', ['wow', ['amaze']]];

        $this->flatten($elements)->shouldBe(['such', 'wow', 'amaze']);
    }

    function it_can_create_an_array_containing_a_range_of_elements()
    {
        $this->range(3)->shouldBe([0, 1, 2, 3]);

        $this->range(3, 1)->shouldBe([1, 2, 3]);

        $this->range(5, 1, 2)->shouldBe([1, 3, 5]);
    }

    function it_can_compute_the_difference_between_two_arrays()
    {
        $one = [1, 2, 3, 4, 5];

        $another = [1, 3, 5];

        $this->difference($one, $another)->shouldBe([2, 4]);
    }

    function it_can_remove_duplicated_values()
    {
        $elements = [1, 2, 3, 3, 4, 5, 5, 6, 1];

        $this->unique($elements)->shouldBe([1, 2, 3, 4, 5, 6]);

        $iterator = function($value)
        {
            return \in_array($value, [1, 3, 5], true);
        };

        $this->unique($elements, $iterator)->shouldBe([1, 3, 3, 5, 5, 1]);
    }

    function it_can_remove_all_instances_from_the_array()
    {
        $elements = ['foo', 'baz', 'bar', 'wow', 'doge'];

        $ignore = ['baz', 'wow'];

        $this->without($elements, $ignore)->shouldBe(['foo', 'bar', 'doge']);
    }

}

