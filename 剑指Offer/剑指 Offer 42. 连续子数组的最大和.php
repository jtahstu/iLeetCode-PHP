<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/14 20:55
 * Des: 剑指 Offer 42. 连续子数组的最大和
 *      输入一个整型数组，数组中的一个或连续多个整数组成一个子数组。求所有子数组的和的最大值。
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
        for ($i = 1; $i < count($nums); $i++) {
            if ($dp[$i - 1] > 0) {
                $dp[$i] = $dp[$i - 1] + $nums[$i];
            } else {
                $dp[$i] = $nums[$i];
            }
        }
//        print_r($dp);
        return max($dp);
    }
}

var_dump((new Solution)->maxSubArray([-2, 1, -3, 4, -1, 2, 1, -5, 4]));

/**
 * 执行用时：48 ms, 在所有 PHP 提交中击败了83.08%的用户
 * 内存消耗：28.3 MB, 在所有 PHP 提交中击败了72.31%的用户
 * 通过测试用例：202 / 202
 */