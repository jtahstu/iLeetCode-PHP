<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/30 12:27
 * Des: 剑指 Offer 14- I. 剪绳子
 *      https://leetcode.cn/problems/jian-sheng-zi-lcof/
 *      给你一根长度为 n 的绳子，请把绳子剪成整数长度的 m 段（m、n都是整数，n>1并且m>1），每段绳子的长度记为 k[0],k[1]...k[m-1] 。请问 k[0]*k[1]*...*k[m-1] 可能的最大乘积是多少？
 *      例如，当绳子的长度是8时，我们把它剪成长度分别为2、3、3的三段，此时得到的最大乘积是18
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function cuttingRope($n)
    {
        $ans = [0, 0, 1, 2, 4];
        if (isset($ans[$n])) return $ans[$n];
        $res = pow(3, intval($n / 3));
        if ($n % 3 == 1) $res = $res / 3 * 4;
        elseif ($n % 3 == 2) $res = $res * 2;
        return $res;
    }
}

/**
 * 打草稿可得出, 3是无敌的, 3*3*3*..., 剩余1就加到前个3上, 剩2就直接乘上
 * 执行用时：8 ms, 在所有 PHP 提交中击败了56.25%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了37.50%的用户
 * 通过测试用例：50 / 50
 */