<?php

namespace spec\Advent\Day1;

use Advent\Day1\InputParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputParserSpec extends ObjectBehavior {


    function it_is_initializable()
    {
        $this->shouldHaveType(InputParser::class);
    }

    function it_tests_input_is_array()
    {
        $this->getInput()->shouldBeArray();
    }
}
