<?php

namespace App\LeetCode\Blind75\TwoPointer;

class ValidPalindrome
{
    // https://leetcode.com/problems/valid-palindrome/

    /**
     *  解法：用頭尾指標來判斷，並需跳過不合法字串以及將大寫字母轉小寫字母。
     *  時間複雜度 O(N)
     *  空間複雜度 O(1)
     * 
     * @param string $s
     * @return bool
     */
    function solution(string $s): bool
    {
        if (strlen($s) < 2) {
            return true;
        }

        $validStr = function (string $str) {
            $askII = ord($str);
            if ($askII > 64 && $askII < 91) {
                $askII += 32;
            }
            # 是否為小寫字母或數字
            return ($askII > 96 && $askII < 123)
                || ($askII > 47 && $askII < 58);
        };

        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            while (!$validStr($s[$left]) && $left < $right) {
                $left++;
            }
            while (!$validStr($s[$right]) && $left < $right) {
                $right--;
            }

            if (strtolower($s[$left]) != strtolower($s[$right])) {
                return false;
            }
            $left++;
            $right--;
        }

        return true;
    }
}
