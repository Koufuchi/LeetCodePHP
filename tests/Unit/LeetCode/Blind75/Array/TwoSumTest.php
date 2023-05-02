<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\TwoSum;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class TwoSumTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'nums' => [2, 7, 11, 15],
            'target' => 9,
            'correct' => [0, 1]
        ],
        1 => [
            'nums' => [3, 2, 4],
            'target' => 6,
            'correct' => [2, 1]
        ],
        2 => [
            'nums' => [3, 3],
            'target' => 6,
            'correct' => [1, 0]
        ],
    ];

    public function testSolution()
    {
        $TwoSum = new TwoSum();

        foreach ($this->tests as $questionArr) {
            $result = $TwoSum->solution(
                $questionArr['nums'],
                $questionArr['target']
            );
            $this->assertArraysAreSimilar($result, $questionArr['correct']);
            $this->assertExecutionTime(0.352, function () use ($TwoSum, $questionArr) {
                $TwoSum->solution(
                    $questionArr['nums'],
                    $questionArr['target']
                );
            });
        }
    }
}
