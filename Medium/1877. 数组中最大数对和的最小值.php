<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/21 17:12
 * Des: 1877. 数组中最大数对和的最小值
 *      https://leetcode.cn/problems/minimize-maximum-pair-sum-in-array/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minPairSum($nums)
    {
        sort($nums);
        $l = 0;
        $r = count($nums) - 1;
        $max = PHP_INT_MIN;
        while ($l < $r) {
            $max = max($max, $nums[$l] + $nums[$r]);
            $l++;
            $r--;
        }
        return $max;
    }
}

/**
 * 执行用时：416 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：31.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：37 / 37
 */