<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\GroupAnagrams;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class GroupAnagramsTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'strs' => ['eat', 'tea', 'tan', 'ate', 'nat', 'bat'],
            'correct' => [['bat'], ['nat', 'tan'], ['ate', 'eat', 'tea']]
        ],
        1 => [
            'strs' => [''],
            'correct' => [['']]
        ],
        2 => [
            'strs' => ['a'],
            'correct' => [['a']]
        ],
        3 => [
            'strs' => ["bdddddddddd", "bbbbbbbbbbc"],
            'correct' => [["bbbbbbbbbbc"], ["bdddddddddd"]]
        ],
        // 測試用，這邊開放時單元測試應報錯。
        // 4 => [
        //     'strs' => ['eat', 'tea', 'tan', 'ate', 'nat', 'bat'],
        //     'correct' => [['bat'], ['natt', 'tan'], ['ate', 'eat', 'tea']]
        // ],
    ];

    public function testSolution()
    {
        $GroupAnagrams = new GroupAnagrams();

        foreach ($this->tests as $questionArr) {
            $result = $GroupAnagrams->solution(
                $questionArr['strs']
            );
            $this->assertArraysHaveSameValueDeep($result, $questionArr['correct']);

            $this->assertExecutionTime(0.352, function () use ($GroupAnagrams, $questionArr) {
                $GroupAnagrams->solution(
                    $questionArr['strs']
                );
            });
        }
    }
}
