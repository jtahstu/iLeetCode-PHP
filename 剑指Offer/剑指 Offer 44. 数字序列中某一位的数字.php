<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 23:49
 * Des: 剑指 Offer 44. 数字序列中某一位的数字
 *      https://leetcode.cn/problems/shu-zi-xu-lie-zhong-mou-yi-wei-de-shu-zi-lcof/
 *      数字以0123456789101112131415…的格式序列化到一个字符序列中。在这个序列中，第5位（从下标0开始计数）是5，第13位是1，第19位是4，等等。
 *      请写一个函数，求任意第n位对应的数字。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function findNthDigit($n)
    {
        $digit = 1;
        $start = 1;
        $count = 9;
        while ($n > $count) { // 1.
            $n -= $count;
            $digit += 1;
            $start *= 10;
            $count = $digit * $start * 9;
        }
        $num = $start + ($n - 1) / $digit; // 2.
        return strval($num)[($n - 1) % $digit] - '0'; // 3.
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了33.33%的用户
 * 通过测试用例：70 / 70
 */