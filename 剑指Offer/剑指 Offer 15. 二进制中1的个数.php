<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 7:45
 * Des: 剑指 Offer 15. 二进制中1的个数
 *      https://leetcode.cn/problems/er-jin-zhi-zhong-1de-ge-shu-lcof/
 *      编写一个函数，输入是一个无符号整数（以二进制串的形式），返回其二进制表达式中数字位数为 '1' 的个数（也被称为 汉明重量).）。
 */

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $count = 0;
        while ($n) {
            $count++;
            $n = $n & ($n - 1);
        }
        return $count;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了34.48%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了68.97%的用户
 * 通过测试用例：601 / 601
 */