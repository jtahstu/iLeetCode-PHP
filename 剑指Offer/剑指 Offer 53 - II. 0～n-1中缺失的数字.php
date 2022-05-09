<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/9 0:32
 * Des: 剑指 Offer 53 - II. 0～n-1中缺失的数字
 *      https://leetcode.cn/problems/que-shi-de-shu-zi-lcof/
 *      一个长度为n-1的递增排序数组中的所有数字都是唯一的，并且每个数字都在范围0～n-1之内。在范围0～n-1内的n个数字中有且只有一个数字不在该数组中，请找出这个数字。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums)
    {
        $res = range(0, count($nums));
        $diff_arr = array_diff($res, $nums);
        return $diff_arr ? current($diff_arr) : -1;
    }
}

var_dump((new Solution)->missingNumber([0,1,3]));

/**
 * 执行用时：40 ms, 在所有 PHP 提交中击败了26.42%的用户
 * 内存消耗：20.9 MB, 在所有 PHP 提交中击败了5.66%的用户
 * 通过测试用例：122 / 122
 */

//正确的解法是二分
//我这就引入额外空间了
//更骚气一点就是 1~n求和-sum(nums)