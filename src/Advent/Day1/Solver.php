<?php

namespace Advent\Day1;

class Solver {

    protected $taxicab;
    protected $parser;

    public function __construct(Taxicab $taxicab, InputParser $inputParser)
    {
        $this->taxicab = $taxicab;
        $this->parser = $inputParser;
    }

    public function solve()
    {
        foreach ($this->parser->getInput() as $input) {
            $move = substr($input, 0, 1);
            $times = substr($input, 1);
            switch ($move) {
                case 'L':
                    $this->taxicab->goLeft($times);
                    break;
                case 'R':
                    $this->taxicab->goRight($times);
                    break;
            }
        }

        return $this->taxicab->getBlocksAway();
    }
}
