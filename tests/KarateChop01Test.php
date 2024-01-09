<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use src\KarateChop01;

final class KarateChop01Test extends TestCase
{
    public function testShouldFindIndexLow(): void
    {
        $karateChop = new KarateChop01();
        $result = $karateChop->execute(3, [1,3,7,9]);
        $this->assertEquals(1, $result);
    }

    public function testShouldFindIndexHigh(): void
    {
        $karateChop = new KarateChop01();
        $result = $karateChop->execute(9, [1,3,7,9]);
        $this->assertEquals(3, $result);
    }

    public function testShouldFindIndexUnEvenHigh(): void
    {
        $karateChop = new KarateChop01();
        $result = $karateChop->execute(9, [1,3,7,9,11]);
        $this->assertEquals(3, $result);
    }

    public function testCannotFindNumberHighEqualsMinusOne(): void
    {
        $karateChop = new KarateChop01();
        $result = $karateChop->execute(8, [1,3,7,9,11]);
        $this->assertEquals(-1, $result);
    }

    public function testCannotFindNumberLowEqualsMinusOne(): void
    {
        $karateChop = new KarateChop01();
        $result = $karateChop->execute(6, [1,3,7,9,11]);
        $this->assertEquals(-1, $result);
    }
}
