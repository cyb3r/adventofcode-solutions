<?php

namespace Advent\Day1;

class Position {

    protected $x;
    protected $y;
    protected $positions = [];
    protected $firstIntersect = false;

    /**
     * Position constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
        $this->positions[$x][$y] = true;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    public function addY($nb)
    {
        $this->addPosition('y', $nb);
        $this->y += $nb;
    }

    public function addX($nb)
    {
        $this->addPosition('x', $nb);
        $this->x += $nb;
    }

    public function addPosition($axis, $nb)
    {
        $a = "moving from [{$this->x}][{$this->y}] with axix of {$axis} with nb of {$nb}";
        if ($axis == 'x') {
            $range = range($this->x + ($nb / abs($nb)), $this->x + $nb);
            foreach ($range as $x) {
                if (isset($this->positions[$x][$this->y]) && !$this->firstIntersect) {
                    $this->firstIntersect = [$x, $this->y];
                }
                $this->positions[$x][$this->y] = true;
            }
        } else if ($axis == 'y') {
            $a = "moving from [{$this->x}][{$this->y}] with axix of {$axis} with nb of {$nb}";
            $range = range($this->y + ($nb / abs($nb)), $this->y + $nb);
            foreach ($range as $y) {
                if (isset($this->positions[$this->x][$y]) && !$this->firstIntersect) {
                    $this->firstIntersect = [$this->x, $y];
                }
                $this->positions[$this->x][$y] = true;
            }
        }
    }

    public function getPositions()
    {
        return $this->positions;
    }

    public function getIntersect()
    {
        return $this->firstIntersect;
    }


}
