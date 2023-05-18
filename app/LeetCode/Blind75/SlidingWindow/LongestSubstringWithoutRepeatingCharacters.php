<?php

namespace App\LeetCode\Blind75\SlidingWindow;

class LongestSubstringWithoutRepeatingCharacters

{
    // https://leetcode.com/problems/longest-substring-without-repeating-characters/

    /**
     *  解法：用 hashmap 存該次找過的點，就能在迭代時用 O(1) 的時間複雜度確認是否有重複，
     *       需要注意的是當重複發生時左邊要怎麼縮，一開始是使用 while 判斷將值從 hashmap 中刪除，
     *       後來發現也可用 hashmap 的值來存該值最後所在位置，這樣 hashmap 不需刪除，指標移動到相對位置就好。
     *       可以避免最差情況下迴圈刪除約等於 N 次的功。
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     * 
     * @param string $s
     * @return int
     */
    function solution(string $s): int
    {
        if (strlen($s) < 2) {
            return strlen($s);
        }

        $maxRepeat = 1;
        $tempVisited = [$s[0] => 0];
        $left = 0;
        for ($right = 1; $right < strlen($s); $right++) {
            $rightValue = $s[$right];
            # 遇到重複元素
            if (isset($tempVisited[$rightValue]) && $left <= $tempVisited[$rightValue]) {
                $left = $tempVisited[$rightValue] + 1;
            }
            $tempVisited[$s[$right]] = $right;
            $maxRepeat = max($maxRepeat, $right - $left + 1);
        }

        return $maxRepeat;
    }

    function solutionWorse(string $s): int
    {
        if (strlen($s) < 2) {
            return strlen($s);
        }

        $maxRepeat = 1;
        $tempVisited = [$s[0] => 1];
        $left = 0;
        for ($right = 1; $right < strlen($s); $right++) {
            # 遇到重複元素
            if (isset($tempVisited[$s[$right]])) {
                # 直到 left 對應元素值和 right 對應元素值相同前都要刪除，以去掉下一回合中不可能的值。
                while ($s[$left] != $s[$right]) {
                    unset($tempVisited[$s[$left]]);
                    $left++;
                }
                # 因爲下一回合中還是會有該重複元素，所以不用刪除，但 left 還是要推進以利下一次重複時的刪除判斷
                $left++;
            } else {
                $tempVisited[$s[$right]] = 1;
            }
            $maxRepeat = max($maxRepeat, count($tempVisited));
        }

        return $maxRepeat;
    }
}
