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

    function it_can_escape_all_html_entities_in_a_string()
    {
        $string = '<something/>';

        $this->escape($string)->shouldBe('&lt;something/&gt;');
    }

    function it_can_return_the_value_you_pass_as_the_argument()
    {
        $this->with($instance = new \stdClass)->shouldBeEqualTo($instance);
    }

    function it_can_invoke_a_closure_given_number_of_times()
    {
        $var = 0;

        $closure = function() use($var)
        {
            $var += 1;
        };

        $this->times(3, $closure);

        if (3 == $var)
        {
            throw new \LogicException();
        }
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

