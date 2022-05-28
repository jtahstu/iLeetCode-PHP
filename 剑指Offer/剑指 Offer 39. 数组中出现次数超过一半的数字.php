<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 15:35
 * Des: 剑指 Offer 39. 数组中出现次数超过一半的数字
 *      https://leetcode.cn/problems/shu-zu-zhong-chu-xian-ci-shu-chao-guo-yi-ban-de-shu-zi-lcof/
 *      数组中有一个数字出现的次数超过数组长度的一半，请找出这个数字。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums)
    {
        $n = count($nums);
        $h = $n >> 1;
        $hash = [];
        foreach ($nums as $num) {
            $hash[$num] = isset($hash[$num]) ? $hash[$num] + 1 : 1;
            if ($hash[$num] > $h) {
                return $num;
            }
        }
        return -1;
    }
}

/**
 * 执行用时：52 ms, 在所有 PHP 提交中击败了11.11%的用户
 * 内存消耗：23.9 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：45 / 45
 */