<?php

namespace Advent\Day2;

class InputParser {

    protected $moves;

    public function __construct()
    {
        $this->moves = collect(array_map(function ($line) {
            return collect(str_split($line));
        }, explode("\n", file_get_contents(__DIR__ . '/input.txt'))));
    }

    public function getLines()
    {
        return $this->moves;
    }
}
