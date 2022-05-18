<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/18 8:09
 * Des: 剑指 Offer 64. 求1+2+…+n
 *      https://leetcode.cn/problems/qiu-12n-lcof/
 *      求 1+2+...+n ，要求不能使用乘除法、for、while、if、else、switch、case等关键字及条件判断语句（A?B:C）。
 */

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function sumNums($n) {
        $n > 0 && $n += $this->sumNums($n-1);
        return $n;
    }
}