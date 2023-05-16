<?php

namespace App\tests\Unit\LeetCode\Blind75\TwoPointer;

use App\LeetCode\Blind75\TwoPointer\ThreeSum;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class ThreeSumTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'nums' => [-1, 0, 1, 2, -1, -4],
            'correct' => [[-1, 0, 1], [-1, -1, 2]]
        ],
        1 => [
            'nums' => [0, 1, 1],
            'correct' => []
        ],
        2 => [
            'nums' => [0, 0, 0],
            'correct' => [[0, 0, 0]]
        ],
        3 => [
            'nums' => [0, 0, 0, 0],
            'correct' => [[0, 0, 0]]
        ],
        4 => [
            'nums' => [-2, 0, 0, 2, 2],
            'correct' => [[-2, 0, 2]]
        ]
    ];

    public function testSolution()
    {
        $ThreeSum = new ThreeSum();

        foreach ($this->tests as $questionArr) {
            $result = $ThreeSum->solution($questionArr['nums'],);
            $this->assertArraysHaveSameValueDeep($result, $questionArr['correct']);

            $this->assertExecutionTime(0.352, function () use ($ThreeSum, $questionArr) {
                $ThreeSum->solution(
                    $questionArr['nums']
                );
            });
        }
    }
}
