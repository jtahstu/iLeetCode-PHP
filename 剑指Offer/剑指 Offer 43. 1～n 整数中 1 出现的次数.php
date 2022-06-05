<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 23:35
 * Des: 剑指 Offer 43. 1～n 整数中 1 出现的次数
 *      https://leetcode.cn/problems/1nzheng-shu-zhong-1chu-xian-de-ci-shu-lcof/
 *      输入一个整数 n ，求1～n这n个整数的十进制表示中1出现的次数。
 *      例如，输入12，1～12这些整数中包含1 的数字有1、10、11和12，1一共出现了5次。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function countDigitOne($n)
    {
        $digit = 1;
        $res = 0;
        $high = intval($n / 10);
        $cur = $n % 10;
        $low = 0;
        while ($high != 0 || $cur != 0) {
            if ($cur == 0)
                $res += $high * $digit;
            elseif ($cur == 1)
                $res += $high * $digit + $low + 1;
            else $res += ($high + 1) * $digit;
            $low += $cur * $digit;
            $cur = $high % 10;
            $high = intval($high / 10);
            $digit *= 10;
        }
        return $res;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了80.00%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了60.00%的用户
 * 通过测试用例：39 / 39
 */