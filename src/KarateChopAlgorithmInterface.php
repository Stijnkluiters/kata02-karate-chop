<?php

declare(strict_types=1);

namespace src;

interface KarateChopAlgorithmInterface
{
    public function execute(int $numberToLookFor, array $sortedArray): int;
}
