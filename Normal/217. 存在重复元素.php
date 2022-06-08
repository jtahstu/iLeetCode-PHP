<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/8 22:13
 * Des: 217. 存在重复元素
 *      https://leetcode.cn/problems/contains-duplicate/
 *      给你一个整数数组 nums 。如果任一值在数组中出现 至少两次 ，返回 true ；如果数组中每个元素互不相同，返回 false 。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums)
    {
        $n = count($nums);
        $hash = [];
        for ($i = 0; $i < $n; $i++) {
            $hash[$nums[$i]] = isset($hash[$nums[$i]]) ? 2 : 1;
            if ($hash[$nums[$i]] == 2) return true;
        }
        return false;
    }
}

/**
 * 执行用时：120 ms, 在所有 PHP 提交中击败了92.35%的用户
 * 内存消耗：30.8 MB, 在所有 PHP 提交中击败了19.88%的用户
 * 通过测试用例：70 / 70
 */