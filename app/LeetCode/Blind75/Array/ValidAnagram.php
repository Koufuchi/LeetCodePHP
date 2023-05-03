<?php

namespace App\LeetCode\Blind75\Array;

class ValidAnagram
{
    // https://leetcode.com/problems/valid-anagram/

    /**
     *  解法：進化為同一個計數陣列可以同時計算兩邊的字符差。
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     */
    function solution(string $s, string $t): bool
    {
        $sLen = strlen($s);
        if ($sLen != strlen($t)) {
            return false;
        }

        $letterCountArr = [];

        for ($i = 0; $i < $sLen; $i++) {
            if (isset($letterCountArr[$s[$i]])) {
                $letterCountArr[$s[$i]]++;
            } else {
                $letterCountArr[$s[$i]] = 1;
            }
            if (isset($letterCountArr[$t[$i]])) {
                $letterCountArr[$t[$i]]--;
            } else {
                $letterCountArr[$t[$i]] = -1;
            }
        }

        foreach ($letterCountArr as $cnt) {
            if ($cnt != 0) {
                return false;
            }
        }

        return true;
    }

    /**
     *  解法：遍歷 s 並寫入計數陣列，之後遍歷 t 並檢查差異。
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     * 
     *  補充：
     *  count_chars() 是以 unicode 編碼當鍵，出現次數當值，時間複雜度是 O(N)。
     *  https://www.php.net/manual/zh/function.count-chars.php
     * 
     *  str_split() 時間複雜度是 O(N)，與其原理有關，他主要是遍歷字串中每個字符並存到回傳陣列。
     * 
     *  以上兩個原生函式的源碼：
     *  https://github.com/php/php-src/blob/master/ext/standard/string.c
     */
    function worseSolution(string $s, string $t): bool
    {
        $sArr = str_split($s);
        $tArr = str_split($t);

        if (count($sArr) !== count($tArr)) {
            return false;
        }

        $sLetterCountArr = [];
        foreach ($sArr as $sStr) {
            if (isset($sLetterCountArr[$sStr])) {
                $sLetterCountArr[$sStr]++;
            } else {
                $sLetterCountArr[$sStr] = 1;
            }
        }

        foreach ($tArr as $tStr) {
            if (!isset($sLetterCountArr[$tStr])) {
                return false;
            }
            if (--$sLetterCountArr[$tStr] < 0) {
                return false;
            }
        }

        return true;
    }
}
