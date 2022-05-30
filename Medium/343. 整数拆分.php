<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/30 13:36
 * Des: 343. 整数拆分
 *      https://leetcode.cn/problems/integer-break/
 *      给定一个正整数 n ，将其拆分为 k 个 正整数 的和（ k >= 2 ），并使这些整数的乘积最大化。
 */

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n) {
        $ans = [0, 0, 1, 2, 4];
        if (isset($ans[$n])) return $ans[$n];
        $res = pow(3, intval($n / 3));
        if ($n % 3 == 1) $res = $res / 3 * 4;
        elseif ($n % 3 == 2) $res = $res * 2;
        return $res;
    }
}