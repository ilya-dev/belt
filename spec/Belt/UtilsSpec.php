<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UtilsSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Utils');
    }

    function it_can_generate_a_unique_indentifier()
    {
        $this->id()->shouldBeString();

        $this->id($prefix = 'foo_')->shouldContain($prefix);
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'contain' => function($subject, $string)
            {
                return \strpos($subject, $string) !== false;
            }
        ];
    }

}

