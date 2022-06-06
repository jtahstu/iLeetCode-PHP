<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 23:24
 * Des: 剑指 Offer 14- II. 剪绳子 II
 *      https://leetcode.cn/problems/jian-sheng-zi-ii-lcof/
 *      给你一根长度为 n 的绳子，请把绳子剪成整数长度的 m 段（m、n都是整数，n>1并且m>1），每段绳子的长度记为 k[0],k[1]...k[m - 1] 。请问 k[0]*k[1]*...*k[m - 1] 可能的最大乘积是多少？例如，当绳子的长度是8时，我们把它剪成长度分别为2、3、3的三段，此时得到的最大乘积是18。
 *      答案需要取模 1e9+7（1000000007），如计算初始结果为：1000000008，请返回 1。
 */

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function cuttingRope($n) {
        $ans = [0, 0, 1, 2, 4];
        if (isset($ans[$n]))
            return $ans[$n];
        $res = 1;
        while ($n > 4) {
            $res *= 3;
            $res = $res % 1000000007;
            $n -= 3;
        }
        return $res * $n % 1000000007;
    }
}

/**
 * 主要就是模的问题, 跟I思路是一样的
 * 执行用时：4 ms, 在所有 PHP 提交中击败了85.71%的用户
 * 内存消耗：18.2 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：55 / 55
 */