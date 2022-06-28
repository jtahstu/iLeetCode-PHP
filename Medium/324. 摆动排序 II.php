<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/28 10:05
 * Desc: 324. 摆动排序 II
 *      https://leetcode.cn/problems/wiggle-sort-ii/
 *      给你一个整数数组 nums，将它重新排列成 nums[0] < nums[1] > nums[2] < nums[3]... 的顺序。
 *      你可以假设所有输入数组都可以得到满足题目要求的结果。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function wiggleSort(&$nums)
    {
        sort($nums);
        $count = count($nums);
        $mid = ($count - 1) >> 1;
        $res = [];
        $right = $count - 1;
        $flag = 1;
        while ($mid >= 0) {
            $res[] = $flag ? $nums[$mid--] : $nums[$right--];
            $flag = !$flag;
        }
        if ($count % 2 == 0) $res[] = $nums[$right];  //偶数个数时需要补一个
        $nums = $res;
    }
}

/**
 * 排序, 前半部分和后半部分交替填充, 时间O(nlogn)空间O(n)
 * 至于时间O(n)空间O(1)看题解区吧
 *
 * 执行用时：52 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：23.3 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：52 / 52
 */