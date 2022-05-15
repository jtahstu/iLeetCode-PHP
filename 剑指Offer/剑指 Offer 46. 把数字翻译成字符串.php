<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 23:03
 * Des: 剑指 Offer 46. 把数字翻译成字符串
 *      https://leetcode.cn/problems/ba-shu-zi-fan-yi-cheng-zi-fu-chuan-lcof/
 *      给定一个数字，我们按照如下规则把它翻译为字符串：0 翻译成 “a” ，1 翻译成 “b”，……，11 翻译成 “l”，……，25 翻译成 “z”。一个数字可能有多个翻译。请编程实现一个函数，用来计算一个数字有多少种不同的翻译方法。
 */

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function translateNum($num)
    {
        if ($num < 10) return 1;
        $str = strval($num);
        $dp = [1];
        $dp[1] = ($num >= 10 && $str[0] . $str[1] <= '25') ? 2 : 1;
        for ($i = 2; $i < strlen($str); $i++) {
            $pre = $str[$i - 1] . $str[$i];
            if ('10' <= $pre && $pre <= '25') {
                $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
            } else {
                $dp[$i] = $dp[$i - 1];
            }
        }
        print_r($dp);
        return end($dp);
    }
}

var_dump((new Solution)->translateNum(12258));  //5
var_dump((new Solution)->translateNum(18580));  //2
var_dump((new Solution)->translateNum(506));  //1

/**
 * 动态规划
 * 我的想法是能和前面拼起来的f(i)=f(i−1)+f(i−2), 不能拼的就是f(i)=f(i−1), 注意06这种不能拼, 它只能翻译成ag
 * 执行用时：8 ms, 在所有 PHP 提交中击败了31.25%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了28.13%的用户
 * 通过测试用例：49 / 49
 */