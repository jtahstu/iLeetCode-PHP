<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/13 21:39
 * Des: 剑指 Offer 63. 股票的最大利润
 *      https://leetcode.cn/problems/gu-piao-de-zui-da-li-run-lcof/
 *      假设把某股票的价格按照时间先后顺序存储在数组中，请问买卖该股票一次可能获得的最大利润是多少？
 */

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        if (count($prices) < 2) return 0;
        $max_rev = PHP_INT_MIN;
        $min = $prices[0];
        for ($i = 1; $i < count($prices); $i++) {
            $min = min($min, $prices[$i]);
            $max_rev = max($max_rev, $prices[$i] - $min);
        }
        return $max_rev;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了91.67%的用户
 * 内存消耗：20.5 MB, 在所有 PHP 提交中击败了69.44%的用户
 * 通过测试用例：200 / 200
 */