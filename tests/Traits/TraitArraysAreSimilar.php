<?php

namespace Tests\Traits;

trait TraitArraysAreSimilar
{
    /**
     * 檢查兩個一維陣列是否相似(相同鍵值，但順序互換)
     */
    function assertArraysAreSimilar(array $a, array $b): bool
    {
        # 檢查數量
        if (count($a) != count($b)) {
            return false;
        }
        # 檢查鍵值
        foreach ($a as $key => $value) {
            if ($b[$key] !== $value) {
                return false;
            }
        }

        return true;
    }
}
