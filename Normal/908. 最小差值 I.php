<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/30 00:38
 * Des: 908. 最小差值 I
 *      https://leetcode-cn.com/problems/smallest-range-i/
 *      给你一个整数数组 nums，和一个整数 k 。
 *      在一个操作中，您可以选择 0 <= i < nums.length 的任何索引 i 。将 nums[i] 改为 nums[i] + x ，其中 x 是一个范围为 [-k, k] 的整数。对于每个索引 i ，最多 只能 应用 一次 此操作。
 *      nums 的 分数 是 nums 中最大和最小元素的差值。
 *      在对  nums 中的每个索引最多应用一次上述操作后，返回 nums 的最低 分数 。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $k
     * @return Integer
     */
    function smallestRangeI($nums, $k)
    {
        $diff = (max($nums) - $k) - (min($nums) + $k);
        return $diff < 0 ? 0 : $diff;

        //更简洁的写法
        return max(0, max($nums) - min($nums) - 2 * $k);
    }
}

var_dump((new Solution())->smallestRangeI([1], 0));
var_dump((new Solution())->smallestRangeI([0, 10], 2));
var_dump((new Solution())->smallestRangeI([1, 3, 6], 3));

/*
 * 执行用时：24 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：20.2 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：68 / 68
 */