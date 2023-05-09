<?php

namespace App\LeetCode\Blind75\Array;

class ProductOfArrayExceptSelf
{
    // https://leetcode.com/problems/product-of-array-except-self/

    /**
     *  解法：我們可以發現一個特性就是對於 nums[i] 來說，他需要的是左 nums[0 ~ i-1] 和右 nums[i+1 ~ N] 兩部分，
     *       由於遍歷的過程可以得到左邊，但是右邊怎麼辦？這時候可以用鏡像的概念來看，你只要反向遍歷就是右半邊了，所以遍歷兩次即可解。
     *  時間複雜度 O(N) 
     *  空間複雜度 O(1)
     * 
     *  限定時間複雜度 O(N)
     *  不能用除法，所以不能用 Codility Lesson TapeEquilibrium 的解法
     *  挑戰空間複雜度 O(1) (不計算回傳陣列)
     * 
     */

    /**
     *  效能極致版
     */
    function solution(array $nums): array
    {
        # 左邊可以直接用回傳陣列而不需要用額外用變數存。
        $ans = [1];
        for ($i = 1; $i < count($nums); $i++) {
            $ans[$i] = $ans[$i - 1] * $nums[$i - 1];
        }

        # 右邊還是需要變數。
        $rightCounter = 1;
        for ($i = count($nums) - 2; $i >= 0; $i--) {
            $rightCounter *= $nums[$i + 1];
            $ans[$i] *= $rightCounter;
        }

        return $ans;
    }

    /**
     *  比較容易理解的版本，解法其實一樣。
     */
    function solutionForRead(array $nums): array
    {
        $ans = [];
        $leftCounter = 1;
        $rightCounter = 1;

        # 先乘左半邊
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($nums[$i - 1])) {
                $leftCounter *= $nums[$i - 1];
            }
            $ans[$i] = $leftCounter;
        }

        # 再乘右半邊
        for ($i = count($nums) - 1; $i >= 0; $i--) {
            if (isset($nums[$i + 1])) {
                $rightCounter *= $nums[$i + 1];
            }
            $ans[$i] *= $rightCounter;
        }

        return $ans;
    }
}
