<?php

namespace App\LeetCode\Blind75\BackTracking;

class CombinationSum
{
    // https://leetcode.com/problems/combination-sum/

    /**
     *  解法：以樹狀的方式來找所有可能值，要注意的是遞迴和迴圈一起使用的時機點。
     *  時間複雜度 O(N^2)
     *  空間複雜度 O()
     * 
     * @param integer[] $candidates
     * @param integer $target
     * @return integer[][]
     */

    function solution($candidates, $target)
    {
        $ans = [];

        # 匿名函式遞迴
        $backTracking = function (&$candidates, $target, $index, $temp, &$ans) use (&$backTracking) {
            # 找到就存，並結束此次遞迴
            if ($target == 0) {
                $ans[] = $temp;

                return;
            }

            # 迴圈測試下一個可以放的值
            for ($i = $index; $i < count($candidates); $i++) {
                # 外部就先檢查，避免進入無用遞迴
                if ($target - $candidates[$i] < 0) {
                    continue;
                }
                $temp[] = $candidates[$i];
                # 進入下次遞迴
                $backTracking($candidates, $target - $candidates[$i], $i, $temp, $ans);
                # 先拔掉上次放的數，以便換成下一個可能值
                array_pop($temp);
            }
        };

        $backTracking($candidates, $target, 0, [], $ans);
        return $ans;
    }

    function solutionWorse(array $candidates, int $target): array
    {
        $ans = [];

        # 匿名函式遞迴
        $backTracking = function (array $temp = [], int $tempNum = 0, int $index = 0) use (&$backTracking, &$candidates, &$target, &$ans) {
            # 計算總和
            $currNum = $tempNum + $candidates[$index];
            $temp[] = $candidates[$index];
            # 找到 target
            if ($currNum == $target) {
                $ans[] = $temp;
                return $ans;
            }
            # 比 target 大代表無可能，終止
            if ($currNum > $target) {
                return [];
            }
            # 往下找其他可能性
            $branch = [];
            for ($i = $index; $i < count($candidates); $i++) {
                $branch[] = $backTracking($temp, $currNum, $i);
            }

            return $branch;
        };

        # 對每個元素作遞迴
        foreach ($candidates as $index => $int) {
            $backTracking([], 0, $index);
        }

        return $ans;
    }
}
