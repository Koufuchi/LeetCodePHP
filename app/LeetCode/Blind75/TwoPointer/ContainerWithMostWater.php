<?php

namespace App\LeetCode\Blind75\TwoPointer;

class  ContainerWithMostWater
{
    // https://leetcode.com/problems/container-with-most-water/

    /**
     *  解法：由於容積都是取決於較短的那邊，所以長的怎麼變都一樣，應該將短的那邊往內縮，再重新計算容積。
     *  時間複雜度 O(N)
     *  空間複雜度 O(1)
     * 
     * @param int[] $height
     * @return int
     */
    function solution(array $height): int
    {
        $left = 0;
        $right = count($height) - 1;
        $max = min($height[$left], $height[$right]) * ($right - $left);

        while ($left < $right) {
            if ($height[$left] > $height[$right]) {
                $right--;
            } else {
                $left++;
            }
            $max = max($max, min($height[$left], $height[$right]) * ($right - $left));
        }

        return $max;
    }
}
