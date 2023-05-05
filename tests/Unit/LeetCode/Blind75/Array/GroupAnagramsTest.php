<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\GroupAnagrams;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;

// TODO: 需拓展自動測試以便能比較二維陣列不管順序只比較值
class GroupAnagramsTest extends TestCase
{
    use TraitPerformance;

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
    ];

    public function testSolution()
    {
        $GroupAnagrams = new GroupAnagrams();

        foreach ($this->tests as $questionArr) {
            $this->assertEquals(
                $questionArr['correct'],
                $GroupAnagrams->solution(
                    $questionArr['strs']
                )
            );
            $this->assertExecutionTime(0.352, function () use ($GroupAnagrams, $questionArr) {
                $GroupAnagrams->solution(
                    $questionArr['strs']
                );
            });
        }
    }
}
