<?php

namespace App\tests\Unit\LeetCode\Blind75\TwoPointer;

use App\LeetCode\Blind75\TwoPointer\ContainerWithMostWater;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class ContainerWithMostWaterTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            'height' => [1, 8, 6, 2, 5, 4, 8, 3, 7],
            'correct' => 49
        ],
        1 => [
            'height' => [1, 1],
            'correct' => 1
        ],
    ];

    public function testSolution()
    {
        $ContainerWithMostWater = new ContainerWithMostWater();

        foreach ($this->tests as $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $ContainerWithMostWater->solution(
                    $questionArr['height']
                )
            );
            $this->assertExecutionTime(0.352, function () use ($ContainerWithMostWater, $questionArr) {
                $ContainerWithMostWater->solution(
                    $questionArr['height']
                );
            });
        }
    }
}
