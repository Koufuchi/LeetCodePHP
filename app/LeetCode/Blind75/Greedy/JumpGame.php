<?php

namespace App\LeetCode\Blind75\Greedy;

class JumpGame

{
    // https://leetcode.com/problems/jump-game


    /**
     *  解法：邊走邊計算能走到的最大值
     *  時間複雜度 O(N)
     *  空間複雜度 O(1)
     * 
     * @param integer[] $nums
     * @return boolean
     */

    function solution($nums): bool
    {
        $max = 0;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            # 計算從起點開始能走的最大值
            $max = max($max, $i + $nums[$i]);
            # 如果只能走到當前，就代表走不完
            if ($max <= $i) {
                return false;
            }
        }

        return true;
    }
}
