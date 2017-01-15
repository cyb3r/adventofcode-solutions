<?php

namespace spec\Advent\Day1;

use Advent\Day1\Position;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PositionSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType(Position::class);
    }


    function it_can_find_intersects()
    {
        $this->beConstructedWith(0, 0);
        $this->addX(8);
        $this->addY(-4);
        $this->addX(-4);
        $this->addY(8);
        $this->getIntersect()->shouldBeArray();
    }

}

