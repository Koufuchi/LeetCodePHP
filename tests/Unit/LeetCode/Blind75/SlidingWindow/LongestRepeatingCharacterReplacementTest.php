<?php

namespace App\tests\Unit\LeetCode\Blind75\TwoPointer;

use App\LeetCode\Blind75\SlidingWindow\LongestRepeatingCharacterReplacement;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class LongestRepeatingCharacterReplacementTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            's' => 'ABAB',
            'k' => 2,
            'correct' => 4
        ],
        1 => [
            's' => 'AABABBA',
            'k' => 1,
            'correct' => 4
        ],
    ];

    public function testSolution()
    {
        $LongestRepeatingCharacterReplacement = new LongestRepeatingCharacterReplacement();

        foreach ($this->tests as $number => $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $LongestRepeatingCharacterReplacement->solution(
                    $questionArr['s'],
                    $questionArr['k']
                ),
                "fail at {$number}."
            );
            $this->assertExecutionTime(0.352, function () use ($LongestRepeatingCharacterReplacement, $questionArr) {
                $LongestRepeatingCharacterReplacement->solution(
                    $questionArr['s'],
                    $questionArr['k']
                );
            });
        }
    }
}
