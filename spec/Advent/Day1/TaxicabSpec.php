<?php

namespace spec\Advent\Day1;

use Advent\Day1\Taxicab;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaxicabSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType(Taxicab::class);
    }

    function it_can_get_blocks_away()
    {
        $this->getBlocksAway()->shouldBe(0);
    }

    function it_can_detect_direction()
    {
        $this->goLeft()->getDirection()->shouldBe('West');
    }

    function it_can_go_left()
    {
        $this->goLeft()->getBlocksAway()->shouldBe(1);
    }

    function it_can_go_right()
    {
        $this->goRight()->getBlocksAway()->shouldBe(1);
    }

    function it_can_go_right_and_left()
    {
        $this->goRight()->goLeft()->getBlocksAway()->shouldBe(2);
    }

    function it_can_go_right_left_left_left_to_init_place()
    {
        $this->goRight()->goLeft()->goLeft()->goLeft()->getBlocksAway()->shouldBe(0);
    }

    function it_can_go_multiple_steps_left()
    {
        $this->goLeft(5)->getBlocksAway()->shouldBe(5);
    }

    function it_can_go_multiple_steps_right()
    {
        $this->goRight(5)->getBlocksAway()->shouldBe(5);
    }

    function it_can_detect_visited_location(){
        $this->hasVisitedTwice()->shouldReturn(false);
    }

    function it_detects_a_twice_visited_location(){
        $this->goRight(8)->goRight(4)->goRight(4)->goRight(8)->hasVisitedTwice()->shouldBe(true);
    }

}