<?php

namespace spec\Advent\Day2;

use Advent\Day2\InputParser;
use Illuminate\Support\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType(InputParser::class);
    }

    function it_can_fetch_input_by_lines()
    {
        $this->getLines()->shouldBeAnInstanceOf(Collection::class);
    }
}
