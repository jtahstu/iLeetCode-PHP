<?php

/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/25 14:25
 * Des: 50. Pow(x, n)
 *      https://leetcode.cn/problems/powx-n/
 *      实现 pow(x, n) ，即计算 x 的 n 次幂函数（即，xn ）。
 */
class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     * 每次n都折半了, 就很快
     */
    function myPow($x, $n)
    {
        if ($n < 0) {
            $x = 1 / $x;
            $n = -$n;
        }
        $res = 1;
        while ($n > 0) {
            if ($n % 2 == 1)
                $res *= $x;
            $x *= $x;
            $n = $n >> 1;
        }
        return $res;
    }

    //递归超时, pow(0.00001, 2147483647)
    function myPow2($x, $n)
    {
        if ($n < 0) {
            return 1 / $this->d($x, -$n);
        }
        return $this->d($x, $n);
    }

    function d($x, $n)
    {
        if ($n == 1) return $x;
        return $x * $this->myPow($x, $n - 1);
    }
}

var_dump((new Solution)->myPow(2, 10));
var_dump((new Solution)->myPow(0.00001, 2147483647));

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了73.53%的用户
 * 通过测试用例：305 / 305
 */