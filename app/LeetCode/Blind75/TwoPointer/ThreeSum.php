<?php

namespace App\LeetCode\Blind75\TwoPointer;

class ThreeSum
{
    // https://leetcode.com/problems/3sum/

    /**
     *  解法：對於每一個元素 i 去找目標為 -i 的 2Sum，使用排序來減少次數，並注意移動判斷來避免重複的答案。
     *  時間複雜度 O(N^2)
     *  空間複雜度 O(N)
     * 
     * @param int[] $nums
     * @return int[][]
     */
    function solution(array $nums): array
    {
        sort($nums);
        $ans = [];

        for ($i = 0; $i < count($nums) - 2; $i++) {
            # 當前元素值跟上一個一樣代表不用找
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }

            # 因為有排序所以找當前元素後面的就好
            $left = $i + 1;
            $right = count($nums) - 1;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                # 因為排序過所以總加大於 0 代表右邊要縮
                if ($sum > 0) {
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $ans[] = [$nums[$i], $nums[$left], $nums[$right]];
                    # 指標移動並注意不重複
                    do {
                        $left++;
                    } while ($left < $right && $nums[$left] == $nums[$left - 1]);
                    do {
                        $right--;
                    } while ($left < $right && $nums[$right] == $nums[$right + 1]);
                }
            }
        }

        return $ans;
    }
}
