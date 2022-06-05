<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 0:17
 * Des: 剑指 Offer 49. 丑数
 *      https://leetcode.cn/problems/chou-shu-lcof/
 *      我们把只包含质因子 2、3 和 5 的数称作丑数（Ugly Number）。求按从小到大的顺序的第 n 个丑数。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n)
    {
        $dp = [0, 1];
        $p2 = $p3 = $p5 = 1;
        for ($i = 2; $i < $n; $i++) {
            $d2 = $dp[$p2] * 2;
            $d3 = $dp[$p3] * 3;
            $d5 = $dp[$p5] * 5;
            $dp[$i] = min($d2, $d3, $d5);
            if ($dp[$i] == $d2) $p2++;
            if ($dp[$i] == $d3) $p3++;
            if ($dp[$i] == $d5) $p5++;
        }
        return $dp[$n];
    }

    function isUglyNum($n): bool
    {
        while ($n % 5 == 0) $n = $n / 5;
        while ($n % 3 == 0) $n = $n / 3;
        while ($n % 2 == 0) $n = $n / 2;
        return $n == 1;
    }
}

/**
 * 当 `i∈[1,n)`，`dp[i] = min(dp[p2] * 2, dp[p3] * 3, dp[p5] * 5)`，然后分别比较 `dp[i]` 与 `dp[p2] * 2`、`dp[p3] * 3`、`dp[p5] * 5` 是否相等，若是，则对应的指针加 1。
 *
 * 执行用时：24 ms, 在所有 PHP 提交中击败了87.50%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了87.50%的用户
 * 通过测试用例：596 / 596
 */