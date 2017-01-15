<?php

namespace Advent\Day2;

use Illuminate\Support\Collection;

class BathroomPuzzle {

    protected $currectKey;
    protected $keys = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
    protected $moves;

    public function __construct($currectKey = 5, InputParser $inputParser)
    {
        $this->currectKey = $currectKey;
        $this->moves = $inputParser->getLines();
    }

    public function getCurrentKey()
    {
        return $this->currectKey;
    }

    public function goLeft()
    {
        if ($this->currectKey % 3 != 1) {
            $this->currectKey -= 1;
        }

        return $this;
    }

    public function goRight()
    {
        if ($this->currectKey % 3 != 0) {
            $this->currectKey += 1;
        }

        return $this;
    }

    public function goUp()
    {
        if ($this->currectKey > 3) {
            $this->currectKey -= 3;
        }

        return $this;
    }

    public function goDown()
    {
        if ($this->currectKey < 7) {
            $this->currectKey += 3;
        }

        return $this;
    }

    public function solve()
    {
        $codes = $this->moves->map(function (Collection $line) {
            $line->each(function ($move) {
                $this->doProperAction($move);
            });

            return $this->getCurrentKey();

        });
        return $codes->implode('');
    }

    public function doProperAction($move)
    {
        switch ($move) {
            case 'U':
                $this->goUp();
                break;
            case 'D':
                $this->goDown();
                break;
            case 'L':
                $this->goLeft();
                break;
            case 'R':
                $this->goRight();
                break;
        }
    }

}
