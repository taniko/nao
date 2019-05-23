<?php


namespace Taniko\Nao\Seed;


class Beacon implements Seed
{

    public function cells(): array
    {
        return [
            [true, true, false, false],
            [true, true, false, false],
            [false, false, true, true],
            [false, false, true, true],
        ];
    }
}