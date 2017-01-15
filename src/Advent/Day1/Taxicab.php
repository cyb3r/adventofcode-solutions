<?php

namespace Advent\Day1;

class Taxicab {

    private $position;
    protected $directions = ['North', 'East', 'South', 'West'];
    protected $direction = 0;
    protected $visitedTwice = false;

    /**
     * Taxicab constructor.
     * @internal param $position
     */
    public function __construct()
    {
        $this->position = new Position(0, 0);
    }


    public function getBlocksAway()
    {
        return abs($this->position->getX()) + abs($this->position->getY());
    }

    public function getX()
    {
        return $this->position->getX();
    }

    public function getY()
    {
        return $this->position->getY();
    }

    public function goNorth($nb = 1)
    {
        $this->position->addY($nb);

        return $this;
    }

    public function goSouth($nb = 1)
    {
        $this->position->addY(-1 * $nb);

        return $this;
    }

    public function goEast($nb = 1)
    {
        $this->position->addX($nb);

        return $this;
    }

    public function goWest($nb = 1)
    {
        $this->position->addX(-1 * $nb);

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

    public function hasVisitedTwice()
    {
        return !!$this->position->getIntersect();
    }

    public function getBlocksAwayIntersect()
    {
        $intersect = $this->position->getIntersect();
        return abs($intersect[0]) + abs($intersect[1]);
    }

}
