<?php

namespace App\tests\Unit\LeetCode\Blind75\Greedy;

use App\LeetCode\Blind75\Greedy\JumpGame;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class JumpGameTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            'nums' => [2, 3, 1, 1, 4],
            'correct' => true
        ],
        1 => [
            'nums' => [3, 2, 1, 0, 4],
            'correct' => false
        ],
    ];

    public function testSolution()
    {
        $JumpGame = new JumpGame();

        foreach ($this->tests as $number => $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $JumpGame->solution(
                    $questionArr['nums']
                ),
                "fail at {$number}."
            );

            $this->assertExecutionTime(0.352, function () use ($JumpGame, $questionArr) {
                $JumpGame->solution(
                    $questionArr['nums'],
                );
            });
        }
    }
}
