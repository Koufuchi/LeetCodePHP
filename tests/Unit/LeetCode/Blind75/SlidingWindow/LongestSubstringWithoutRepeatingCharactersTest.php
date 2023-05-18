<?php

namespace App\tests\Unit\LeetCode\Blind75\TwoPointer;

use App\LeetCode\Blind75\SlidingWindow\LongestSubstringWithoutRepeatingCharacters;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class LongestSubstringWithoutRepeatingCharactersTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            's' => 'abcabcbb',
            'correct' => 3
        ],
        1 => [
            's' => 'bbbbb',
            'correct' => 1
        ],
        2 => [
            's' => 'pwwkew',
            'correct' => 3
        ],
        3 => [
            's' => 'au',
            'correct' => 2
        ],
        4 => [
            's' => 'aab',
            'correct' => 2
        ],
        5 => [
            's' => 'aabaab!bb',
            'correct' => 3
        ],
        6 => [
            's' => 'bab',
            'correct' => 2
        ],
        7 => [
            's' => 'qrsvbspk',
            'correct' => 5
        ],
        8 => [
            's' => 'dvdf',
            'correct' => 3
        ],
    ];

    public function testSolution()
    {
        $LongestSubstringWithoutRepeatingCharacters = new LongestSubstringWithoutRepeatingCharacters();

        foreach ($this->tests as $number => $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $LongestSubstringWithoutRepeatingCharacters->solution(
                    $questionArr['s']
                ),
                "fail at {$number}."
            );
            $this->assertExecutionTime(0.352, function () use ($LongestSubstringWithoutRepeatingCharacters, $questionArr) {
                $LongestSubstringWithoutRepeatingCharacters->solution(
                    $questionArr['s']
                );
            });
        }
    }
}
