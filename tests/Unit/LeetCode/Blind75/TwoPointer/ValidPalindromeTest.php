<?php

namespace App\tests\Unit\LeetCode\Blind75\TwoPointer;

use App\LeetCode\Blind75\TwoPointer\ValidPalindrome;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class ValidPalindromeTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            's' => 'A man, a plan, a canal: Panama',
            'correct' => true
        ],
        1 => [
            's' => 'race a car',
            'correct' => false
        ],
        2 => [
            's' => ' ',
            'correct' => true
        ],
        3 => [
            's' => '0P',
            'correct' => false
        ],
        4 => [
            's' => '@@@@a',
            'correct' => true
        ],
    ];

    public function testSolution()
    {
        $ValidPalindrome = new ValidPalindrome();

        foreach ($this->tests as $number => $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $ValidPalindrome->solution(
                    $questionArr['s']
                ),
                "fail at {$number}."
            );
            $this->assertExecutionTime(0.352, function () use ($ValidPalindrome, $questionArr) {
                $ValidPalindrome->solution(
                    $questionArr['s']
                );
            });
        }
    }
}
