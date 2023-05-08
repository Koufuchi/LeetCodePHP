<?php

namespace Tests\Traits;

trait TraitArraysAreSimilar
{
    /**
     * 檢查兩個一維陣列是否相似(相同鍵值，但順序互換)
     */
    function assertArraysHaveSameKeyValuePair(array $a, array $b): void
    {
        # 檢查數量
        $this->assertEquals(count($a), count($b));

        # 檢查鍵值
        foreach ($a as $key => $value) {
            $this->assertEquals($b[$key], $value);
        }
    }

    /**
     * 檢查兩個一維陣列是否相似(全部值一樣，但鍵可以不一樣)
     */
    function assertArraysHaveSameValue(array $a, array $b): void
    {
        # 檢查數量
        $this->assertEquals(count($a), count($b));

        # 記錄 a 的元素出現次數
        $aValueCountArr = [];
        foreach ($a as $aValue) {
            $aValueCountArr[$aValue]++;
        }
        foreach ($b as $bValue) {
            # 檢查是否都是 a 出現過的，有就減 1
            $this->assertTrue(isset($aValueCountArr[$bValue]));
            $aValueCountArr[$bValue]--;
        }

        # 檢查比對結果
        $isSame = true;
        foreach ($aValueCountArr as $cnt) {
            if ($cnt !== 0) {
                $isSame = false;
                break;
            }
        }
        $this->assertTrue($isSame);
    }

    // function assertArraysAreSimilarDeep(array $a, array $b): bool
    // {
    //     foreach ($a as $valueOne) {
    //         // if($valueOne)
    //     }

    //     return true;
    // }
}
