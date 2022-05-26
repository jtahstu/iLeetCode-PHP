<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 8:19
 * Des: 191. 位1的个数
 *      https://leetcode.cn/problems/number-of-1-bits/
 */

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $count = 0;
        while ($n) {
            $count++;
            $n = $n & ($n - 1);
        }
        return $count;
    }
}