<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AbstractToolsetSpec extends ObjectBehavior {

    function it_allows_you_to_start_chaining_method_calls()
    {
        $this->chain()->shouldBeAnInstanceOf('Belt\Chain');
    }

}

namespace Belt;

class AbstractToolset extends \Belt\Toolset {}

