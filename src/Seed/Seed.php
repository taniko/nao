<?php
declare(strict_types=1);

namespace Taniko\Nao\Seed;

interface Seed
{
    public function cells(): array;
}