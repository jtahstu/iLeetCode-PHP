<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/19 2:16
 * Des: 462. 最少移动次数使数组元素相等 II
 *      https://leetcode.cn/problems/minimum-moves-to-equal-array-elements-ii/
 *      给你一个长度为 n 的整数数组 nums ，返回使所有数组元素相等需要的最少移动数。在一步操作中，你可以使数组中的一个元素加 1 或者减 1 。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves2($nums)
    {
        $n = count($nums);
        sort($nums);
        $mid = $nums[$n >> 1];
        $count = 0;
        for ($i = 0; $i < $n; $i++) {
            $count += abs($nums[$i] - $mid);
        }
        return $count;
    }
}

/**
 * 两边都加减到中位数是最优解
 *
 * 执行用时：24 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.9 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：30 / 30
 */