<?php

namespace App\LeetCode\Blind75\Array;

class LongestConsecutiveSequence
{
    // https://leetcode.com/problems/longest-consecutive-sequence/

    /**
     *  限定時間複雜度為 O(N)，沒說數字不會重複出現。
     */

    /** 
     *  前面想到的 worse 解法都是想說找到最小和最大值就能必免計算重複路徑，
     *  但反而因此將時間複雜度綁在元素最大最小差值上，但其實只要在計算前檢查「陣列存在比欲計算值還小1」的值，
     *  便代表此值不需要找，因為遍歷的過程中一定包含他，舉例來說陣列為 [3,0,1,2] 時，你只會希望他同路徑計算一次，
     *  所以遍歷到 3 時，因為已存在 3-1=2 了，代表不管怎樣必定會遍歷到 2，所以 3 根本不用管他，因為你只在乎最大連續值。
     *  至於如何讓檢查也是 O(1) 的部分只要先遍歷一次用新陣列就好。
     * 
     *  時間複雜度 O(N)  
     *  空間複雜度 O(N)
     * 
     * @param int[] $nums
     * @return int
     */
    function solution(array $nums): int
    {
        # 以值為鍵寫入新陣列已便查找，順便篩掉重複的
        foreach ($nums as $int) {
            if (!isset($uniqueArr[$int])) {
                $uniqueArr[$int] = 1;
            }
        }

        $maxCnt = 0;
        foreach ($uniqueArr as $int => $unused) {
            # 這邊很重要，要避免已找過的路徑重複查找，O(N^2)->O(N)
            if (isset($uniqueArr[$int - 1])) {
                continue;
            }

            # 迴圈尋找是否有往上加的
            $cnt = 1;
            while (isset($uniqueArr[++$int])) {
                $cnt++;
            }
            $maxCnt = max($maxCnt, $cnt);
        }

        return $maxCnt;
    }

    /**
     *  時間複雜度 O(N+K)，空間複雜度O(N)，K 為所給元素最大最小差值
     *  雖然不用定義出現陣列所以解決了空間問題，
     *  但在數字大小差距太大的情況還是會時間爆掉，例如最小給 0 最大給 999999999，
     *  由於 K 有可能遠超於 N，已經是必須獨立考量的東西了。
     */
    function solutionWorse2(array $nums): int
    {
        # 另做一個不重複陣列，以元素數值當鍵
        $uniqueArr = [];

        # 找出輸入陣列的最小和最大值
        $maxInt = PHP_INT_MIN;
        $minInt = PHP_INT_MAX;
        foreach ($nums as $int) {
            if (!isset($uniqueArr[$int])) {
                $uniqueArr[$int] = 1;
            }
            $maxInt = ($int > $maxInt) ? $int : $maxInt;
            $minInt = ($int < $minInt) ? $int : $minInt;
        }

        $maxCnt = 0;
        $cnt = 0;
        for ($minInt; $minInt <= $maxInt; $minInt++) {
            $cnt = (isset($uniqueArr[$minInt])) ? $cnt + 1 : 0;
            $maxCnt = ($cnt > $maxCnt) ? $cnt : $maxCnt;
        }

        return $maxCnt;
    }

    /**
     *  時間複雜度 O(N+K)，空間複雜度O(N+K)，K 為所給元素最大最小差值，
     *  由於 K 有可能遠超於 N，已經是必須獨立考量的東西了。
     *  因為可能的元素最大值很大，最差情況空間會爆掉。
     */
    function solutionWorse(array $nums): int
    {
        # 找出輸入陣列的最小和最大值
        $maxInt = PHP_INT_MIN;
        $minInt = PHP_INT_MAX;
        foreach ($nums as $int) {
            $maxInt = ($int > $maxInt) ? $int : $maxInt;
            $minInt = ($int < $minInt) ? $int : $minInt;
        }

        # 以最大和最小值定出是否出現的陣列(照順序)
        $isAppearArr = [];
        for ($minInt; $minInt <= $maxInt; $minInt++) {
            $isAppearArr[$minInt] = 0;
        }

        # 有出現就為 1
        foreach ($nums as $int) {
            $isAppearArr[$int] = 1;
        }

        # 找出連續出現最大
        $maxCnt = 0;
        $cnt = 0;
        foreach ($isAppearArr as $isAppear) {
            $cnt = ($isAppear == 1) ? $cnt + 1 : 0;
            $maxCnt = ($cnt > $maxCnt) ? $cnt : $maxCnt;
        }

        return $maxCnt;
    }
}
