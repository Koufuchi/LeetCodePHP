<?php

namespace App\LeetCode\Blind75\Array;

class EncodeAndDecodeStrings
{
    // leetcode 此題為付費版
    // https://www.lintcode.com/problem/659/


    /**
     *  把字串陣列轉成字串並加上分隔符與數字。
     * 
     *  時間複雜度 O(N)
     *  空間複雜度 O(1)
     *
     * @param string[] $strs
     * @return string
     */
    function encode(array $strs): string
    {
        $encoded = '';
        foreach ($strs as $str) {
            // 把字串長度加到開頭，並用 # 分隔
            $encoded .= strlen($str) . '#' . $str;
        }
        return $encoded;
    }

    /**
     * 把加密完的字串解碼成字串陣列。
     * 由於起始一定是加密做的，且會直接跳到下一個加密處，所以不需擔心被原本字串影響。
     * 
     *  時間複雜度 O(N)
     *  空間複雜度 O(N)
     *
     * @param string $s
     * @return string[]
     */
    function decode(string $s): array
    {
        $decodedArr = array();
        $i = 0;
        while ($i < strlen($s)) {
            # 找出此 part 包含幾個字，可能超過個位數
            $partLen = 0;
            while ($s[$i] !== '#') {
                $partLen = $partLen * 10 + (int)$s[$i];
                $i++;
            }

            # 記錄此 part 的字元
            $part = '';
            for ($j = $i + 1; $j <= $i + $partLen; $j++) {
                $part .= $s[$j];
            }

            # 加入解析完陣列
            $decodedArr[] = $part;

            # 指標移動到下一個標示 part 包含字數的起始處
            $i += $partLen + 1;
        }
        return $decodedArr;
    }
}
