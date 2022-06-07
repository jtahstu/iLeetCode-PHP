<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/7 0:32
 * Des: 231. 2 的幂
 *      https://leetcode.cn/problems/power-of-two/
 *      给你一个整数 n，请你判断该整数是否是 2 的幂次方。如果是，返回 true ；否则，返回 false 。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n)
    {
        if ($n == 1) return true;
        if ($n & 1) return false;
        return $this->isPowerOfTwo($n >> 1);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了96.43%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了42.86%的用户
 * 通过测试用例：1108 / 1108
 */

//可以这样
//if(n <= 0){
//    return false;
//}
//return (n & (n - 1)) == 0;