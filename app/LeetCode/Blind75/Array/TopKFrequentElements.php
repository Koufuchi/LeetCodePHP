<?php

namespace App\LeetCode\Blind75\Array;

class TopKFrequentElements
{
    // https://leetcode.com/problems/top-k-frequent-elements/

    /**
     *  限定時間複雜度要優於 O(N log N)
     *  保證答案組合唯一，這代表不會有 k 為 2 卻發現 nums 是 [1,2,3] 之類的複數組合。
     * 
     *  解法：最一開始想到的一定是遍歷一次計算出現次數，然後取前 k 個，但是題目限定的時間複雜度代表了不能使用排序演算法，
     *       換個角度想，由於我們的主要目標是出現次數，所以以數字種類為鍵的出現次數陣列不利於搜尋，那如果改以出現次數為鍵呢？
     *       我們可以遍歷出現次數陣列並將他存到另一個以出現次數為鍵的陣列，這樣就等同於分類完了。
     *       寫完去查後才發現這種作法叫做 Bucket Sort。
     * 
     *  時間複雜度 O(N)  
     *  空間複雜度 O(N)
     * 
     * @param int[] $nums
     * @param int $k
     * @return int[]
     */
    function solution(array $nums, int $k): array
    {
        # 計算數字出現次數
        $cntArr = [];
        foreach ($nums as $int) {
            $cntArr[$int] = ($cntArr[$int] ?? 0) + 1;
        }

        # 以出現次數為鍵做分類
        $bucketSortArr = array_fill(1, count($nums), null);
        foreach ($cntArr as $int => $cnt) {
            $bucketSortArr[$cnt][] = $int;
        }

        # 找出前 k 個
        $ans = [];
        for ($i = count($bucketSortArr); $i > 0; $i--) {
            if (!empty($bucketSortArr[$i])) {
                $ans = array_merge($ans, $bucketSortArr[$i]);
                $k -= count($bucketSortArr[$i]);
                if ($k <= 0) {
                    return $ans;
                }
            }
        }
    }
}
