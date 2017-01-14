<?php

namespace Advent\Day1;

class Taxicab {

    private $position = ['x' => 0, 'y' => 0];
    protected $directions = ['North', 'East', 'South', 'West'];
    protected $direction = '0';


    public function getBlocksAway()
    {
        return abs($this->position['x']) + abs($this->position['y']);
    }

    public function getX()
    {
        return $this->position['x'];
    }

    public function getY()
    {
        return $this->position['y'];
    }

    public function goNorth($nb = 1)
    {
        $this->position['y'] += $nb;

        return $this;
    }


    public function goSouth($nb = 1)
    {
        $this->position['y'] -= $nb;

        return $this;
    }

    public function goEast($nb = 1)
    {
        $this->position['x'] += $nb;

        return $this;
    }


    public function goWest($nb = 1)
    {
        $this->position['x'] -= $nb;

        return $this;
    }

    public function goLeft($nb = 1)
    {
        return $this->nextDirection(-1)->move($nb);
    }

    public function goRight($nb = 1)
    {
        return $this->nextDirection(1)->move($nb);
    }

    public function move($nb)
    {
        return $this->{'go' . $this->getDirection()}($nb);
    }

    public function nextDirection($dir)
    {
        $this->direction = ($this->direction + ($dir) + count($this->directions)) % count($this->directions);

        return $this;
    }

    public function getDirection()
    {
        return $this->directions[$this->direction];
    }


}
