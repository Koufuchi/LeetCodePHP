<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\TopKFrequentElements;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class TopKFrequentElementsTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'nums' => [1, 1, 1, 2, 2, 3],
            'k' => 2,
            'correct' => [2, 1]
        ],
        1 => [
            'nums' => [1],
            'k' => 1,
            'correct' => [1]
        ],
        2 => [
            'nums' => [5, 3, 1, 1, 1, 3, 73, 1],
            'k' => 1,
            'correct' => [1]
        ],
        3 => [
            'nums' => [-1, -1],
            'k' => 1,
            'correct' => [-1]
        ],
    ];

    public function testSolution()
    {
        $TopKFrequentElements = new TopKFrequentElements();

        foreach ($this->tests as $questionArr) {
            $result = $TopKFrequentElements->solution(
                $questionArr['nums'],
                $questionArr['k']
            );
            $this->assertArraysHaveSameValueDeep($result, $questionArr['correct']);

            $this->assertExecutionTime(0.352, function () use ($TopKFrequentElements, $questionArr) {
                $TopKFrequentElements->solution(
                    $questionArr['nums'],
                    $questionArr['k']
                );
            });
        }
    }
}
