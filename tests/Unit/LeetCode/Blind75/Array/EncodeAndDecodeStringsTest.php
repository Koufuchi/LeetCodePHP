<?php

namespace App\tests\Unit\LeetCode\Blind75\Array;

use App\LeetCode\Blind75\Array\EncodeAndDecodeStrings;
use PHPUnit\Framework\TestCase;
use Tests\Traits\TraitPerformance;
use Tests\Traits\TraitArraysAreSimilar;


class EncodeAndDecodeStringsTest extends TestCase
{
    use TraitPerformance, TraitArraysAreSimilar;

    public $tests = [
        0 => [
            'strs' => ['1#', '3#World', '你好，世界！3#'],
        ],
        1 => [
            'strs' => [''],
        ],
        2 => [
            'strs' => ['', 'weefwrgfwergwetrgwerfvwerfv werfvwerverfv', '', '@2131213123123'],
        ],
    ];

    public function testSolution()
    {
        $EncodeAndDecodeStrings = new EncodeAndDecodeStrings();

        foreach ($this->tests as $questionArr) {
            $this->assertEquals(
                $questionArr['strs'],
                $EncodeAndDecodeStrings->decode(
                    $EncodeAndDecodeStrings->encode($questionArr['strs'])
                )
            );

            $this->assertExecutionTime(0.352, function () use ($EncodeAndDecodeStrings, $questionArr) {
                $EncodeAndDecodeStrings->decode(
                    $EncodeAndDecodeStrings->encode($questionArr['strs'])
                );
            });
        }
    }
}
