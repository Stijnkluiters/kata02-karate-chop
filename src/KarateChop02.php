<?php

declare(strict_types=1);

namespace src;

class KarateChop02 implements KarateChopAlgorithmInterface
{
    public function __construct(
        private bool $debug = false
    ) {
    }

    public function execute(int $numberToLookFor, array $sortedArray): int
    {
        $length = count($sortedArray);

        $firsthalf = array_slice($sortedArray, 0, (int)ceil($length / 2), true);
        $secondhalf = array_slice($sortedArray, (int)ceil($length / 2), $length, true);

        $pointer = array_key_last($firsthalf);
        $firstHalfValue = $sortedArray[$pointer];
        if ($this->debug === true) {
            var_dump($firsthalf, $secondhalf, $sortedArray, $pointer, $firstHalfValue, $numberToLookFor);
        }
        if ($firstHalfValue === $numberToLookFor) {
            return $pointer;
        }

        if ($firstHalfValue > $numberToLookFor) {
            if ($firsthalf === $sortedArray) {
                return -1;
            }
            return $this->execute($numberToLookFor, $firsthalf);
        }

        return $this->execute($numberToLookFor, $secondhalf);
    }
}
