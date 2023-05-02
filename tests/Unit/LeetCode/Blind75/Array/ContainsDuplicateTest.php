<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\ContainsDuplicate;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;


class ContainsDuplicateTest extends TestCase
{
    use TraitPerformance;

    public $tests = [
        0 => [
            'nums' => [1, 2, 3, 1],
            'correct' => true
        ],
    ];

    public function testSolution()
    {
        $ContainsDuplicate = new ContainsDuplicate();

        foreach ($this->tests as $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $ContainsDuplicate->solution(
                    $questionArr['nums']
                )
            );
            $this->assertExecutionTime(0.352, function () use ($ContainsDuplicate, $questionArr) {
                $ContainsDuplicate->solution(
                    $questionArr['nums']
                );
            });
        }
    }
}
