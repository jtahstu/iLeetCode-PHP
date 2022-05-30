<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 19:41
 * Des: 剑指 Offer 57 - II. 和为s的连续正数序列
 *      https://leetcode.cn/problems/he-wei-sde-lian-xu-zheng-shu-xu-lie-lcof/
 *      输入一个正整数 target ，输出所有和为 target 的连续正整数序列（至少含有两个数）。序列内的数字由小到大排列，不同序列按照首个数字从小到大排列。
 */

class Solution
{

    /**
     * @param Integer $target
     * @return Integer[][]
     */
    function findContinuousSequence($target)
    {
        $l = 1;
        $res = [];
        while ($l <= ($target >> 1)) {
            $r = $l + 1;
            while (($l + $r) * ($r - $l + 1) / 2 < $target) $r++;
            if (($l + $r) * ($r - $l + 1) / 2 == $target) $res[] = range($l, $r);
            $l++;
        }
        return $res;
    }
}

print_r((new Solution)->findContinuousSequence(9));

/**
 * 双指针
 * 执行用时：60 ms, 在所有 PHP 提交中击败了16.67%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了93.33%的用户
 * 通过测试用例：32 / 32
 */