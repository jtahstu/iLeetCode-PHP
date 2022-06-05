<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 19:14
 * Des: 剑指 Offer 60. n个骰子的点数
 *      https://leetcode.cn/problems/nge-tou-zi-de-dian-shu-lcof/
 *      把n个骰子扔在地上，所有骰子朝上一面的点数之和为s。输入n，打印出s的所有可能的值出现的概率。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Float[]
     */
    function dicesProbability($n)
    {
        $total = pow(6, $n);
        $dp[0] = array_fill(0, 6, 1);
        for ($i = 1; $i < $n; $i++) { //第n个色子
            $j = count($dp[$i - 1]) + 6; //每一轮的数量都是上轮+6
            while ($j > 0) {
                for ($k = 1; $k <= 6; $k++) {
                    $dp[$i][$j] += $dp[$i - 1][$j - $k] ?? 0;
                }
                $j--;
            }
        }
        $dp = $dp[$n - 1];
//        print_r($dp);
        $res = [];
        for ($i = $n; $i <= $n * 6; $i++) {
            $res[] = $dp[$i - 1] / $total; //不用保留6位小数, 不然四舍五入后系统判WA
        }
        return $res;
    }
}

print_r((new Solution)->dicesProbability(2));

/**
 * for (第n枚骰子的点数 i = 1; i <= 6; i ++) {
 * dp[n][j] += dp[n-1][j - i]
 * }
 *
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.3 MB, 在所有 PHP 提交中击败了10.00%的用户
 * 通过测试用例：11 / 11
 */