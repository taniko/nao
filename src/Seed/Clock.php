<?php


namespace Taniko\Nao\Seed;


class Clock implements Seed
{
    public function cells(): array
    {
        return [
            [false, true, false, false],
            [false, false, true, true],
            [true, true, false, false],
            [false, false, true, false],
        ];
    }
}