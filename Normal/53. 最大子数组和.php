<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/14 21:14
 * Des: 53. 最大子数组和
 *      https://leetcode.cn/problems/maximum-subarray/
 *      给你一个整数数组 nums ，请你找出一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $dp = [$nums[0]];
        $max = $dp[0];
        for ($i = 1; $i < count($nums); $i++) {
            $dp[$i] = max($dp[$i - 1] + $nums[$i], $nums[$i]);
            $max = max($dp[$i], $max);
        }
        return $max;
    }
}

/**
 * 执行用时：220 ms, 在所有 PHP 提交中击败了21.97%的用户
 * 内存消耗：31.4 MB, 在所有 PHP 提交中击败了17.38%的用户
 * 通过测试用例：209 / 209
 */