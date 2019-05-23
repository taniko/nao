<?php


namespace Taniko\Nao\Seed;


class Blinker implements Seed
{
    /**
     * @return array
     */
    public function cells(): array
    {
        return [
            [false, true, false],
            [false, true, false],
            [false, true, false],
        ];
    }
}