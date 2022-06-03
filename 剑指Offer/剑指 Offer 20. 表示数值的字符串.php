<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/2 23:16
 * Des: 剑指 Offer 20. 表示数值的字符串
 *      https://leetcode.cn/problems/biao-shi-shu-zhi-de-zi-fu-chuan-lcof/
 *      请实现一个函数用来判断字符串是否表示数值（包括整数和小数）。
 */

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
        return is_numeric($s);
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了75.00%的用户
 * 通过测试用例：1480 / 1480
 */