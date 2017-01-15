<?php

namespace spec\Advent\Day2;

use Advent\Day2\BathroomPuzzle;
use Advent\Day2\InputParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BathroomPuzzleSpec extends ObjectBehavior
{
    function let(){
        $this->beConstructedWith(5, new InputParser());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BathroomPuzzle::class);
    }

    function it_starts_from_5(){
        $this->getCurrentKey()->shouldBe(5);
    }

    function it_can_go_left(){
        $this->goLeft()->getCurrentKey()->shouldBe(4);
    }

    function it_cannot_go_left_from_3(){
        $this->goLeft()->goLeft()->getCurrentKey()->shouldBe(4);
    }

    function it_can_go_right(){
        $this->goRight()->getCurrentKey()->shouldBe(6);
    }

    function it_cannot_go_right_from_6(){
        $this->goRight()->goRight()->getCurrentKey()->shouldBe(6);
    }

    function it_can_go_up(){
        $this->goUp()->getCurrentKey()->shouldBe(2);
    }

    function it_cannot_go_up_from_2(){
        $this->goUp()->goUp()->getCurrentKey()->shouldBe(2);
    }

    function it_can_go_down(){
        $this->goDown()->getCurrentKey()->shouldBe(8);
    }

    function it_cannot_go_down_from_8(){
        $this->goDown()->goDown()->getCurrentKey()->shouldBe(8);
    }

    function it_can_do_several_moves(){
        $this->goUp()->goUp()->goLeft()->goLeft()->getCurrentKey()->shouldBe(1);
    }

    function it_can_solve_the_problem(){
        $this->solve()->shouldBe(10);
    }
}
