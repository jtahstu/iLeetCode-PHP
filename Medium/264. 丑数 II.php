<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 1:03
 * Des: 264. 丑数 II
 *      https://leetcode.cn/problems/ugly-number-ii/
 *      给你一个整数 n ，请你找出并返回第 n 个 丑数 。丑数 就是只包含质因数 2、3 和/或 5 的正整数。
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
        for ($i = 2; $i <= $n; $i++) {
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
}

/**
 * 执行用时：28 ms, 在所有 PHP 提交中击败了88.89%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了22.22%的用户
 * 通过测试用例：596 / 596
 */