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
     * 檢查兩個一維陣列是否相似(全部值一樣，但鍵不一樣)
     */
    function assertArraysHaveSameValue(array $a, array $b): void
    {
        // # 檢查數量
        $this->assertEquals(count($a), count($b));

        // # 檢查鍵值
        $aValueCountArr = [];
        foreach ($a as $aValue) {
            $aValueCountArr[$aValue]++;
        }
        foreach($b as $bValue){
            $this->assertTrue(isset($aValueCountArr[$bValue]));
            $aValueCountArr[$bValue]--;
        }
        $isSame = true;
        foreach($aValueCountArr as $cnt){
            if($cnt !== 0){
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
