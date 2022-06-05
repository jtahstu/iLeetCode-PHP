<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/4 23:58
 * Des: 剑指 Offer 17. 打印从1到最大的n位数
 *      https://leetcode.cn/problems/da-yin-cong-1dao-zui-da-de-nwei-shu-lcof/
 *      输入数字 n，按顺序打印出从 1 到最大的 n 位十进制数。比如输入 3，则打印出 1、2、3 一直到最大的 3 位数 999。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function printNumbers($n)
    {
        return range(1, pow(10, $n) - 1);
    }
}

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：29.6 MB, 在所有 PHP 提交中击败了66.67%的用户
 * 通过测试用例：5 / 5
 */