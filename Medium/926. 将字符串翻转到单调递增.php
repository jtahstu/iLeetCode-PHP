<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 0:34
 * Des: 926. 将字符串翻转到单调递增
 *      https://leetcode.cn/problems/flip-string-to-monotone-increasing/
 *      如果一个二进制字符串，是以一些 0（可能没有 0）后面跟着一些 1（也可能没有 1）的形式组成的，那么该字符串是 单调递增 的。
 *      给你一个二进制字符串 s，你可以将任何 0 翻转为 1 或者将 1 翻转为 0 。
 *      返回使 s 单调递增的最小翻转次数。
 */

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function minFlipsMonoIncr($s)
    {
        $len = strlen($s);
        $sum[-1] = 0;
        for ($i = 0; $i < $len; $i++) {
            $sum[$i] = $sum[$i - 1] + ($s[$i] == 1 ? 1 : 0);
        }
        $total_sum = $sum[$len - 1];
        $min = PHP_INT_MAX;
        for ($i = 0; $i <= $len; $i++) {
            $sum_l = $sum[$i - 1];
            $sum_r = ($len - $i) - ($total_sum - $sum_l);
            $min = min($min, $sum_l + $sum_r);
        }
        return $min;
    }
}

/**
 * 前缀和, 然后遍历每位得到 前面变为0的次数+后面变为1的次数, 取最小值即可. 注意最后一位+1即前面全变0的代价也要看一下
 * 执行用时：80 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：26.2 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：93 / 93
 *
 * dp就这样
 *  dp[i][0] = dp[i−1][0]+I(s[i]=‘1’)
 *  dp[i][1] = min(dp[i−1][0],dp[i−1][1])+I(s[i]=‘0’)
 */