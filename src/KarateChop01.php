<?php

declare(strict_types=1);

namespace src;

class KarateChop01 implements KarateChopAlgorithmInterface
{
    public function __construct(
        private bool $debug = false
    ) {
    }

    public function execute(int $numberToLookFor, array $sortedArray): int
    {
        for ($i = 0, $iMax = count($sortedArray); $i < $iMax; $i++) {
            $length = count($sortedArray);

            $firsthalf = array_slice($sortedArray, 0, (int)ceil($length / 2), true);
            $secondhalf = array_slice($sortedArray, (int)ceil($length / 2), $length, true);

            $pointer = array_key_last($firsthalf);
            $firstHalfValue = $sortedArray[$pointer];
            if ($this->debug === true) {
                var_dump($firsthalf, $secondhalf, $sortedArray, $pointer);
            }
            if ($firstHalfValue === $numberToLookFor) {
                return $pointer;
            }
            if ($firstHalfValue > $numberToLookFor) {
                $sortedArray = $firsthalf;
            } else {
                $sortedArray = $secondhalf;
            }
        }

        return -1;
    }
}
