<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/13 19:18
 * Des: 剑指 Offer 10- II. 青蛙跳台阶问题
 *      https://leetcode.cn/problems/qing-wa-tiao-tai-jie-wen-ti-lcof/
 *      一只青蛙一次可以跳上1级台阶，也可以跳上2级台阶。求该青蛙跳上一个 n 级的台阶总共有多少种跳法。
 */

class Solution
{
    public $cache = [1, 1, 2];

    function numWays($n)
    {
        $mod = 1e9 + 7;
        if (isset($this->cache[$n])) return $this->cache[$n];
        $this->cache[$n] = ($this->numWays($n - 1) % $mod + $this->numWays($n - 2) % $mod) % $mod;
        return $this->cache[$n];
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了86.96%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了78.26%的用户
 * 通过测试用例：51 / 51
 */