<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/9 0:31
 * Des: 剑指 Offer 53 - I. 在排序数组中查找数字 I
 *      https://leetcode.cn/problems/zai-pai-xu-shu-zu-zhong-cha-zhao-shu-zi-lcof/
 *      统计一个数字在排序数组中出现的次数。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $count = 0;
        foreach ($nums as $num) {
            if ($num == $target) {
                $count++;
            }
        }
        return $count;
    }
}

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了91.84%的用户
 * 内存消耗：22.6 MB, 在所有 PHP 提交中击败了79.59%的用户
 * 通过测试用例：88 / 88
 */