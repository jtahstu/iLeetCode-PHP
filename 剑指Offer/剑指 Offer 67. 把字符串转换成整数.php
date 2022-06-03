<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/3 15:01
 * Des: 剑指 Offer 67. 把字符串转换成整数
 *      https://leetcode.cn/problems/ba-zi-fu-chuan-zhuan-huan-cheng-zheng-shu-lcof/
 *      写一个函数 StrToInt，实现把字符串转换成整数这个功能。不能使用 atoi 或者其他类似的库函数。
 */

class Solution
{

    /**
     * @param String $str
     * @return Integer
     */
    function strToInt($str)
    {
        $str = trim($str);
        $reg = '/^[\+\-]?\d+/';
        preg_match_all($reg, $str, $list);
        $num = (int)$list[0][0];
        $num = $num < -2147483648 ? -2147483648 : $num;
        return $num > 2147483647 ? 2147483647 : $num;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了41.67%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了8.33%的用户
 * 通过测试用例：1079 / 1079
 */