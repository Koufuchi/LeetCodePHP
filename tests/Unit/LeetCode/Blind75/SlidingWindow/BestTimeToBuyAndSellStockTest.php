<?php

namespace App\tests\Unit\LeetCode\Blind75\TwoPointer;

use App\LeetCode\Blind75\SlidingWindow\BestTimeToBuyAndSellStock;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class BestTimeToBuyAndSellStockTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            'prices' => [7, 1, 5, 3, 6, 4],
            'correct' => 5
        ],
        1 => [
            'prices' => [7, 6, 4, 3, 1],
            'correct' => 0
        ],
    ];

    public function testSolution()
    {
        $BestTimeToBuyAndSellStock = new BestTimeToBuyAndSellStock();

        foreach ($this->tests as $number => $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $BestTimeToBuyAndSellStock->solution(
                    $questionArr['prices']
                ),
                "fail at {$number}."
            );
            $this->assertExecutionTime(0.352, function () use ($BestTimeToBuyAndSellStock, $questionArr) {
                $BestTimeToBuyAndSellStock->solution(
                    $questionArr['prices']
                );
            });
        }
    }
}
