<?php

namespace Advent\Day1;

class InputParser {

    protected $input;

    public function __construct()
    {
        $data = file_get_contents(__DIR__ . '/input.txt');
        $this->input = array_map(function ($item) {
            return trim($item);
        }, explode(',', $data));
    }

    public function getInput()
    {
        return $this->input;
    }

}