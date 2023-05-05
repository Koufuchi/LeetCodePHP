<?php

namespace App\LeetCode\Blind75\Array;

class GroupAnagrams
{
    // https://leetcode.com/problems/group-anagrams/

    /**
     *  解法：
     *  1. 每個字串做一個字符出現次數表，但這樣就會變成 字串總數＊(每個字串的最大長度＊當下有的出現次數表(最大等於字串總數)＊當下有的出現次數表最大長度)，
     *     光看就不可行。
     *  2. 既然存出現次數陣列沒比較快，就改成存排序後的不重複字串，也就是對每個字串做排序後去比較我們存的不重複字串，
     *     會變成 字串總數＊最大字串排序的時間複雜度。基本上排序演算法最快也要 O(NlogN)
     *  3. 存出現次數陣列沒比較快的原因是我們必須遍歷這個陣列來比對不同出現次數組合，但我們從題目中可以知道只會有小寫字母，
     *     所以如果有辦法能照字母順序存出現次數而不需要經過排序的話，就能把這個出現次數組合當成一個字串存進 HashMap 當 key，
     *     這樣就不需要遍歷不同的出現次數陣列了，只要檢查 key 是否已存在就好。
     *     會變成 字串總數＊最大字串長度。
     *     在這裡，我們可以使用針對小寫字母常用的做法，也就是將其轉成 ASCII 值操作，由於 a 的 ASCII 值是 97，b 是 98，以此類推到 z，
     *     所以可以將與 a 相減的值當作索引，剛好是索引從 0 開始到 25 的陣列，
     *     注意陷阱： 1:1 3:10 => 1010; 1:10 2:1 => 1010 不同字元的字串但有一樣的結果
     * 
     *  ord()函數獲取一個字元的 ASCII值
     *  chr()函數獲取一個 ASCII 值對應的字元
     */

    /**
     *  解法 3
     *  時間複雜度 O(N * M)  N 為字串總數，M 為最大字串長度
     *  空間複雜度 O(N)
     * 
     * @param String[] $strs
     * @return String[][]
     */
    function solution(array $strs): array
    {
        $uniqueLetterCounts = [];
        foreach ($strs as $str) {
            # 記錄字母出現次數(依字母減 a 的值決定索引)
            $letterCounts = array_fill(0, 26, 0);
            for ($i = 0; $i < strlen($str); $i++) {
                $letterCounts[ord($str[$i]) - ord('a')]++;
            }

            # 放入對應分組
            $uniqueLetterCounts[implode('#', $letterCounts)][] = $str;
        }

        return array_values($uniqueLetterCounts);
    }

    /**
     *  解法 2
     *  時間複雜度 O(N * MlogM)  N 為字串總數，M 為最大字串長度
     *  空間複雜度 O(N)
     */
    function solutionWorse(array $strs): array
    {
        $ans = [];
        foreach ($strs as $str) {
            # 字串轉陣列
            $strSplitArr = [];
            for ($i = 0; $i < strlen($str); $i++) {
                $strSplitArr[$i] = $str[$i];
            }

            # 排序後重組回字串
            sort($strSplitArr);
            $sortedStr = implode('', $strSplitArr);

            # 放入對應分組
            $ans[$sortedStr][] = $str;
        }

        return array_values($ans);
    }
}
