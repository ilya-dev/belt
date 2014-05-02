<?php namespace spec\Belt;

use PhpSpec\ObjectBehavior;

class UtilitiesSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Belt\Utilities');
    }

    function it_generates_a_unique_identifier()
    {
        $this->id()->shouldBeString();

        $this->id($prefix = 'foo_')->shouldContain($prefix);
    }

    function it_escapes_all_html_entities_in_a_string()
    {
        $string = '<something/>';

        $this->escape($string)->shouldBe('&lt;something/&gt;');
    }

    function it_returns_the_value_you_pass_as_the_first_argument()
    {
        $this->with($instance = new \stdClass)->shouldBeEqualTo($instance);
    }

    function it_invokes_the_closure_a_number_of_times()
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

