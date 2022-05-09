<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/9 0:31
 * Des: 剑指 Offer 03. 数组中重复的数字
 *      https://leetcode.cn/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof/
 *      找出数组中重复的数字。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findRepeatNumber($nums)
    {
        $list = [];
        foreach ($nums as $num) {
            if (isset($list[$num])) {
                return $num;
            }
            $list[$num] = 1;
        }
        return -1;
    }
}

/**
 * 执行用时：60 ms, 在所有 PHP 提交中击败了80.83%的用户
 * 内存消耗：30.5 MB, 在所有 PHP 提交中击败了5.00%的用户
 * 通过测试用例：25 / 25
 */