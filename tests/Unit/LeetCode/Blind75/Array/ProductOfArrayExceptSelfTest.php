<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\ProductOfArrayExceptSelf;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class ProductOfArrayExceptSelfTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'strs' => [1, 2, 3, 4],
            'correct' => [24, 12, 8, 6]
        ],
        1 => [
            'strs' => [-1, 1, 0, -3, 3],
            'correct' => [0, 0, 9, 0, 0]
        ],
    ];

    public function testSolution()
    {
        $ProductOfArrayExceptSelf = new ProductOfArrayExceptSelf();

        foreach ($this->tests as $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $ProductOfArrayExceptSelf->solution(
                    $questionArr['strs'],
                )
            );

            $this->assertExecutionTime(0.352, function () use ($ProductOfArrayExceptSelf, $questionArr) {
                $ProductOfArrayExceptSelf->solution(
                    $questionArr['strs']
                );
            });
        }
    }
}
