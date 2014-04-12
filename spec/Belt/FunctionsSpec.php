<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FunctionsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Functions');
    }

    function it_can_cache_the_returned_value()
    {
        $closure = function()
        {
            return \uniqid();
        };

        $this->cache($closure)->shouldBeEqualTo($this->cache($closure));
    }

    function it_can_wrap_a_closure_inside_another_closure()
    {
        $closure = function()
        {
            return 'foo';
        };

        $wrapper = function($closure)
        {
            return $closure().'bar';
        };

        $this->wrap($closure, $wrapper)->shouldReturn('foobar');
    }

    function it_can_make_a_composition_of_an_array_of_closures()
    {
        $closures = [];

        $closures[] = function($var)
        {
            return $var;
        };

        $closures[] = function($var)
        {
            return 'foo' == $var;
        };

        $this->compose($closures, ['foo'])->shouldBe(true);
    }

    function it_can_lock_a_closure_so_it_can_be_called_only_once()
    {
        $closure = function()
        {
            static $switch;

            if ( ! is_null($switch)) throw new \LogicException;

            $switch = true;
        };

        $this->once($closure);
        $this->shouldNotThrow('LogicException')->duringOnce($closure);
    }

    function it_can_make_a_closure_callable_only_after_a_number_of_tries()
    {
        $closure = function()
        {
            return 'foo';
        };

        $this->after(2, $closure)->shouldBe(null);
        $this->after(2, $closure)->shouldBe(null);

        $this->after(2, $closure)->shouldBe('foo');
    }

}

