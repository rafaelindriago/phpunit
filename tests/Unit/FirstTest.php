<?php

namespace Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * 
 */
class FirstTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function testSum()
    {
        $c = new Calculator();

        $this->assertEquals(5, $c->sum(3, 2));
    }

    /**
     * @test
     *
     * @return void
     */
    public function testAsserts()
    {
        self::assertTrue(true);
    }

    /**
     * @test
     *
     * @return void
     */
    public function testToComplete(): void
    {
        $this->markTestIncomplete();
    }

    /**
     * @test
     *
     * @return void
     */
    public function testSkipped(): void
    {
        if (true) {
            $this->markTestSkipped("Skipped");

            $this->assertTrue(true);
        }
    }

    /**
     * @test
     * @doesNotPerformAssertions
     *
     * @return void
     */
    public function testNothing(): void
    {
    }
}
