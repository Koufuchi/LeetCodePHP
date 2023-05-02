<?php

namespace App\LeetCode\Blind75\Array;

class ContainsDuplicate
{
    // https://leetcode.com/problems/contains-duplicate/

    /**
     *  解法：記住造訪過的值，簡單版 TwoSum
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     */
    function solution(array $nums): bool
    {
        $visistedArr = [];
        foreach ($nums as $value) {
            if (isset($visistedArr[$value])) {
                return true;
            }
            $visistedArr[$value] = 1;
        }

        return false;
    }
}
