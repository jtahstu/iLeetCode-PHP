<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/9 23:36
 * Des: 1. 两数之和
 *      https://leetcode.cn/problems/two-sum/
 *      给定一个整数数组 nums 和一个整数目标值 target，请你在该数组中找出 和为目标值 target  的那 两个 整数，并返回它们的数组下标。
 *      你可以假设每种输入只会对应一个答案。但是，数组中同一个元素在答案里不能重复出现。
 *      你可以按任意顺序返回答案。
 */

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $hash = [];
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            if (isset($hash[$target - $nums[$i]])) {
                return [$hash[$target - $nums[$i]], $i];
            }
            $hash[$nums[$i]] = $i;
        }
        return [-1, -1];
    }
}

/**
 * 哈希表
 * 执行用时：8 ms, 在所有 PHP 提交中击败了99.84%的用户
 * 内存消耗：19.7 MB, 在所有 PHP 提交中击败了18.12%的用户
 * 通过测试用例：57 / 57
 */