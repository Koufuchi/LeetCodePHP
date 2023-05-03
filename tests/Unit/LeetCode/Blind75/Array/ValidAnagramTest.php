<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\ValidAnagram;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class ValidAnagramTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            's' => 'anagram',
            't' => 'nagaram',
            'correct' => true
        ],
        1 => [
            's' => 'rat',
            't' => 'car',
            'correct' => false
        ],
        2 => [
            's' => 's',
            't' => 't',
            'correct' => false
        ],
        3 => [
            's' => 's',
            't' => 's',
            'correct' => true
        ],
        3 => [
            's' => 'st',
            't' => 'ts',
            'correct' => true
        ],
        4 => [
            's' => 'ststttstttstttstttststststtt',
            't' => 'tssssttttsttsttsttststtttsts',
            'correct' => false
        ],
    ];

    public function testSolution()
    {
        $ValidAnagram = new ValidAnagram();

        foreach ($this->tests as $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $ValidAnagram->solution(
                    $questionArr['s'],
                    $questionArr['t']
                )
            );
            $this->assertExecutionTime(0.352, function () use ($ValidAnagram, $questionArr) {
                $ValidAnagram->solution(
                    $questionArr['s'],
                    $questionArr['t']
                );
            });
            $this->assertEquals(
                $questionArr['correct'],
                $ValidAnagram->worseSolution(
                    $questionArr['s'],
                    $questionArr['t']
                )
            );
            $this->assertExecutionTime(0.352, function () use ($ValidAnagram, $questionArr) {
                $ValidAnagram->worseSolution(
                    $questionArr['s'],
                    $questionArr['t']
                );
            });
        }
    }
}
