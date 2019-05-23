<?php
declare(strict_types=1);


namespace Taniko\Nao;


use Taniko\Nao\Seed\Seed;

/**
 * Class Universe
 * @package Taniko\Nao
 *
 * @property int $width
 * @property int $height
 * @property [][]bool $matrix
 */
class Universe
{
    const ALIVE_CELL = '■︎ ';
    const DEAD_CELL = '□ ️';

    private $width;
    private $height;
    private $matrix;

    /**
     * Universe constructor.
     * @param int $width
     * @param int $height
     */
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->initialize();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $text = '';
        for ($y = 0; $y < $this->height; $y++) {
            for ($x = 0; $x < $this->width; $x++) {
                $text .= $this->matrix[$y][$x] ? self::ALIVE_CELL : self::DEAD_CELL;
            }
            $text .= "\n";
        }
        return rtrim($text, "\n");
    }

    /**
     *
     */
    private function initialize()
    {
        for ($y = 0; $y < $this->height; $y++) {
            for ($x = 0; $x < $this->width; $x++) {
                $this->matrix[$y][$x] = false;
            }
        }
    }

    /**
     * evolve the universe
     */
    public function evolve()
    {
        $evolved_matrix = [];
        foreach ($this->matrix as $y => $row) {
            foreach ($row as $x => $cell) {
                $evolved_matrix[$y][$x] = $cell ? $this->alive($x, $y) : $this->born($x, $y);
            }
        }
        $this->matrix = $evolved_matrix;
    }

    /**
     * @param int $target_x
     * @param int $target_y
     * @return int
     */
    private function countAliveNeighbor(int $target_x, int $target_y): int
    {
        $count = 0;
        $limit_y = $target_y + 1;
        $limit_x = $target_x + 1;

        for ($y = $target_y - 1; $y <= $limit_y; $y++) {
            for ($x = $target_x - 1; $x <= $limit_x; $x++) {
                if ($x === $target_x && $y === $target_y) {
                    continue;
                } elseif (isset($this->matrix[$y][$x]) && $this->matrix[$y][$x]) {
                    $count++;
                }
            }
        }
        return $count;
    }

    /**
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function alive(int $x, int $y): bool
    {
        $count = $this->countAliveNeighbor($x, $y);
        return $count === 2 || $count === 3;
    }

    /**
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function born(int $x, int $y): bool
    {
        return $this->countAliveNeighbor($x, $y) === 3;
    }

    public function deployCells(int $target_x, int $target_y, Seed $seed)
    {
        $cells = $seed->cells();
        foreach ($cells as $y => $row) {
            foreach ($row as $x => $cell) {
                $this->matrix[$target_y + $y][$target_x + $x] = $cell;
            }
        }
    }
}