<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/14 22:29
 * Des: 6067. 分割数组的方案数
 *      https://leetcode.cn/problems/number-of-ways-to-split-array/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function waysToSplitArray($nums)
    {
        $sum = array_sum($nums);
        $sums = [];
        $count = 0;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            $sums[$i] = $sums[$i - 1] + $nums[$i];
            if ($sums[$i] >= $sum - $sums[$i]) {
                $count++;
            }
        }
        return $count;
    }
}

//AC