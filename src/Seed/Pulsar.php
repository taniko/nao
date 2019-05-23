<?php


namespace Taniko\Nao\Seed;


class Pulsar implements Seed
{
    public function cells(): array
    {
        return [
            [false, false, false, false, false, false, false],
            [false, true, false, false, false, true, false],
            [false, true, false, true, false, true, false],
            [false, true, false, false, false, true, false],
            [false, false, false, false, false, false, false],
        ];
    }
}