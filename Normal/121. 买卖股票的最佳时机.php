<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/10 18:15
 * Des: 121. 买卖股票的最佳时机
 *      https://leetcode.cn/problems/best-time-to-buy-and-sell-stock/
 *      给定一个数组 prices ，它的第 i 个元素 prices[i] 表示一支给定股票第 i 天的价格。
 *      你只能选择 某一天 买入这只股票，并选择在 未来的某一个不同的日子 卖出该股票。设计一个算法来计算你所能获取的最大利润。
 *      返回你可以从这笔交易中获取的最大利润。如果你不能获取任何利润，返回 0 。
 */

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
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