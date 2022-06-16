<?php

/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 14:09
 * Desc: 532. 数组中的 k-diff 数对
 *      https://leetcode.cn/problems/k-diff-pairs-in-an-array/
 *      给你一个整数数组 nums 和一个整数 k，请你在数组中找出 不同的 k-diff 数对，并返回不同的 k-diff 数对 的数目。
 *      k-diff 数对定义为一个整数对 (nums[i], nums[j]) ，并满足下述全部条件：
 *          0 <= i, j < nums.length
 *          i != j
 *          nums[i] - nums[j] == k
 *      注意，|val| 表示 val 的绝对值。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $k
     * @return Integer
     */
    function findPairs($nums, $k)
    {
        $hash = [];
        $count = 0;
        foreach ($nums as $num) {
            $hash[$num] = isset($hash[$num]) ? $hash[$num] + 1 : 1;
        }
        $nums = array_unique($nums);
        foreach ($nums as $num) {
            if (isset($hash[$num + $k])) {
                if ($k == 0 && $hash[$num] == 1) {
                    continue;
                } else {
                    $count++;
                }
            }
        }
        return $count;
    }
}

/**
 * 简单理解就行, 没啥弯弯绕
 * 执行用时：16 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：21.8 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：60 / 60
 */