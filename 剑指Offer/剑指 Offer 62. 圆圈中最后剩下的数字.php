<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/30 13:28
 * Des: 剑指 Offer 62. 圆圈中最后剩下的数字
 *      https://leetcode.cn/problems/yuan-quan-zhong-zui-hou-sheng-xia-de-shu-zi-lcof/
 *      0,1,···,n-1这n个数字排成一个圆圈，从数字0开始，每次从这个圆圈里删除第m个数字（删除后从下一个数字开始计数）。求出这个圆圈里剩下的最后一个数字。
 */

class Solution
{

    /**
     * @param Integer $n
     * @param Integer $m
     * @return Integer
     */
    function lastRemaining($n, $m)
    {
        if ($n < 1 || $m < 1) return -1;
        $last = 0;
        for ($i = 2; $i <= $n; $i++) {
            $last = ($last + $m) % $i;
        }
        return $last;
    }
}

/**
 * 约瑟夫环
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了63.64%的用户
 * 通过测试用例：36 / 36
 */