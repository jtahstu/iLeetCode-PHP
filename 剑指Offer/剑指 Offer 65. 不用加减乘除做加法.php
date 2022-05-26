<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 7:57
 * Des: 剑指 Offer 65. 不用加减乘除做加法
 *      https://leetcode.cn/problems/bu-yong-jia-jian-cheng-chu-zuo-jia-fa-lcof/
 *      写一个函数，求两个整数之和，要求在函数体内不得使用 “+”、“-”、“*”、“/” 四则运算符号。
 */

class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function add($a, $b) {
        while ($b != 0) {
            $c = ($a & $b) << 1;
            $a = $a ^ $b;
            $b = $c;
        }
        return $a;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了53.85%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了30.77%的用户
 * 通过测试用例：51 / 51
 */