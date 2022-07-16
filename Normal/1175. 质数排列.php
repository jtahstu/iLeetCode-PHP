<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/30 10:43
 * Desc: 1175. 质数排列
 *      https://leetcode.cn/problems/prime-arrangements/
 *      请你帮忙给从 1 到 n 的数设计排列方案，使得所有的「质数」都应该被放在「质数索引」（索引从 1 开始）上；你需要返回可能的方案总数。
 *      让我们一起来回顾一下「质数」：质数一定是大于 1 的，并且不能用两个小于它的正整数的乘积来表示。
 *      由于答案可能会很大，所以请你返回答案 模 mod 10^9 + 7 之后的结果即可。
 */

class Solution
{

    public $primeNums = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];

    /**
     * @param Integer $n
     * @return Integer
     */
    function numPrimeArrangements($n)
    {
        $mod = 10e8 + 7;
        $count = 0;
        foreach ($this->primeNums as $num) {
            $count += $num <= $n ? 1 : 0;
        }
        $ans = 1;
        for ($i = 1; $i <= $count; $i++) {
            $ans = ($ans * $i) % $mod;
        }
        for ($i = 1; $i <= ($n - $count); $i++) {
            $ans = ($ans * $i) % $mod;
        }
        return $ans;
    }
}

/**
 * 求质数个数, 然后质数全排列乘以非质数全排列
 *
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：100 / 100
 */