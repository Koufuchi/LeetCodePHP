<?php

namespace App\LeetCode\Blind75\Array;

class TwoSum
{
    // https://leetcode.com/problems/two-sum/

    /**
     *  解法：記住造訪過的索引和值
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     */
    function solution(array $nums, int $target): array
    {
        $visitedArr = [];
        foreach ($nums as $index => $int) {
            if (isset($visitedArr[$target - $int])) {
                return [$index, $visitedArr[$target - $int]];
            }
            $visitedArr[$int] = $index;
        }

        return [];
    }
}
