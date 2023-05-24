<?php

namespace App\LeetCode\Blind75\SlidingWindow;

class LongestRepeatingCharacterReplacement

{
    // https://leetcode.com/problems/longest-repeating-character-replacement/

    /**
     *  解法：不以單個起始字母去往後檢查，而是以是否超過 k 為優先考量，也就是說當我遇到的第一個字母是 A 時，
     *       我並不會去管下一個出現的是不是 A，而是只計算當下的最大字母出現次數 m，除了 m 之外窗口內還有 k 個其他字母出現次數
     *       的容許空間，當超過時窗口左邊界就縮減 1，這樣就不需要侷限在我現在是以哪個字母為主。
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     * 
     * @param string $s
     * @param integer $k
     * @return integer
     */
    function solution(string $s, int $k): int
    {
        # 窗口內各字母出現次數 
        $countArr = [];
        $count = 0;
        $left = 0;
        $maxLen = 0;

        for ($right = 0; $right < strlen($s); $right++) {

            # 找窗口內最大的單個字母出現次數
            $count = max($count, ++$countArr[$s[$right]]);

            # 當窗口內除了最大單個字母之外的字母出現次數 > k，表示需縮減
            if ($right - $left + 1 - $count > $k) {
                $countArr[$s[$left]]--;
                $left++;
            }

            $maxLen = max($maxLen, $right - $left + 1);
        }

        return $maxLen;
    }

    function solutionWorse(string $s, int $k): int
    {
        $max = 1;
        # 遇到不一樣的記錄
        $blockArr = [];
        $left = 0;
        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$left] != $s[$i]) {
                $blockArr[$i] = $s[$i];
                if ($k > 0) {
                    $k--;
                } else {
                    # 將左指標移到第一次不一樣的位置
                    $left = array_key_first($blockArr);
                    unset($blockArr[$left]);
                    $k++;
                    continue;
                }
            }
            $max = max($max, $i - $left + 1);
        }

        return $max;
    }
}
