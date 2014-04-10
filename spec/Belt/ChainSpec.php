<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChainSpec extends ObjectBehavior {

    function let(Dummy $mock)
    {
        $this->beConstructedWith($mock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Chain');
    }

    function it_allows_you_to_chain_method_calls(Dummy $mock)
    {
        $mock->getFoo()->willReturn('foo');
        $mock->getBar('foo')->willReturn('bar');

        $object = $this->getWrappedObject();

        if ($object->getFoo()->getBar()->value() != 'bar')
        {
            throw new \LogicException();
        }
    }

}

class Dummy {

    public function getFoo() {}

    public function getBar() {}

}

