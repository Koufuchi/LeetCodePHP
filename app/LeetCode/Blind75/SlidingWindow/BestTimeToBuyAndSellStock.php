<?php

namespace App\LeetCode\Blind75\SlidingWindow;

class BestTimeToBuyAndSellStock
{
    // https://leetcode.com/problems/best-time-to-buy-and-sell-stock/

    /**
     *  解法：需要找到比暴力 O(N^2) 更好的做法，可以發現跟 ContainerWithMostWater 一樣，如果發現比自己更小的值，
     *       就代表無論後面右邊可能多大，永遠都是那個更小值的差距會更多，就可以直接移到該更小值去找了。
     *       針對買入和賣出有不同指標判斷條件。
     *       原先用左右指標，後來發現只需要多用左指標就好，因為在遍歷時的當下位置其實就等於右指標了。
     *  時間複雜度 O(N)
     *  空間複雜度 O(1)
     * 
     * @param int[] $prices
     * @return int
     */
    function solution(array $prices): int
    {
        $min = $prices[0];
        $maxProfit = 0;

        foreach ($prices as $int) {
            if ($int <= $min) {
                $min = $int;
            } elseif ($int - $min > $maxProfit) {
                $maxProfit = $int - $min;
            }
        }
        return $maxProfit;
    }

    function solutionWorse(array $prices): int
    {
        $maxProfit = 0;
        $left = 0;
        $right = 1;

        while ($right <= count($prices) - 1) {
            if ($prices[$left] < $prices[$right]) {
                $maxProfit = max($maxProfit, $prices[$right] - $prices[$left]);
                $right++;
            } elseif ($prices[$left] > $prices[$right]) {
                $left = $right;
                $right = $left + 1;
            } else {
                $right++;
            }
        }

        return $maxProfit;
    }
}
