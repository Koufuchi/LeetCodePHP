<?php

namespace App\tests\Unit\LeetCode\Blind75\BackTracking;

use App\LeetCode\Blind75\BackTracking\CombinationSum;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class CombinationSumTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'candidates' => [2, 3, 6, 7],
            'target' => 7,
            'correct' => [[2, 2, 3], [7]]
        ],
        1 => [
            'candidates' => [2, 3, 5],
            'target' => 8,
            'correct' => [[2, 2, 2, 2], [2, 3, 3], [3, 5]]
        ],
        2 => [
            'candidates' => [2],
            'target' => 1,
            'correct' => []
        ],
    ];

    public function testSolution()
    {
        $CombinationSum = new CombinationSum();

        foreach ($this->tests as $number => $questionArr) {
            $result = $CombinationSum->solution(
                $questionArr['candidates'],
                $questionArr['target']
            );
            $this->assertArraysHaveSameValueDeep($result, $questionArr['correct']);

            $this->assertExecutionTime(0.352, function () use ($CombinationSum, $questionArr) {
                $CombinationSum->solution(
                    $questionArr['candidates'],
                    $questionArr['target']
                );
            });
        }
    }
}
