<?php

namespace spec\Advent\Day1;

use Advent\Day1\InputParser;
use Advent\Day1\Solver;
use Advent\Day1\Taxicab;
use Mockery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SolverSpec extends ObjectBehavior {

    function let(Taxicab $taxicab, InputParser $parser)
    {
        $this->beConstructedWith($taxicab, $parser);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Solver::class);
    }

    function it_can_solve_a_problem_1(){
        $parser = Mockery::mock(InputParser::class);
        $parser->shouldReceive('getInput')->once()->andReturn(['L5', 'R3']);
        $this->beConstructedWith(new Taxicab, $parser);
        $this->solve()->shouldBe(8);
    }

    function it_can_solve_a_problem(){
        $this->beConstructedWith(new Taxicab, new InputParser);
        $this->solve()->shouldBe(242);
    }

    function it_can_solve_a_problem_intersect(){
        $this->beConstructedWith(new Taxicab, new InputParser);
        $this->solveIntersect()->shouldBe(150);
    }
}
