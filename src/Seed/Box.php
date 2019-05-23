<?php


namespace Taniko\Nao\Seed;


class Box implements Seed
{
    /**
     * @return array
     */
    public function cells(): array
    {
        return [
            [true, true],
            [true, true],
        ];
    }
}