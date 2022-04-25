<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/18 0:29
 * Des: 386. 字典序排数
 *      https://leetcode-cn.com/problems/lexicographical-numbers/
 *      给你一个整数 n ，按字典序返回范围 [1, n] 内所有整数。
 * 你必须设计一个时间复杂度为 O(n) 且使用 O(1) 额外空间的算法。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function lexicalOrder($n)
    {
        $arr = range(1, $n);
        $sort_arr = &$arr;
        array_multisort($sort_arr, SORT_STRING, SORT_ASC, $arr);
        return $arr;
    }

    //题解的思路，深度递归
    private $n;
    private $list;

    function lexicalOrder递归($n)
    {
        $this->n = $n;
        for ($i = 1; $i <= 9; $i++) {
            $this->dfs($i);
        }
        return $this->list;
    }

    function dfs($x)
    {
        if ($x > $this->n) return false;
        $this->list[] = $x;
        for ($j = 0; $j <= 9; $j++) {
            $this->dfs($x * 10 + $j);
        }
    }
}

//echo implode(" ", (new Solution())->lexicalOrder(132)) . PHP_EOL;
echo implode(" ", (new Solution())->lexicalOrder递归(132)) . PHP_EOL;

/*
 * 数组排序
 * 执行用时：100 ms, 在所有 PHP 提交中击败了33.33%的用户
 * 内存消耗：29.1 MB, 在所有 PHP 提交中击败了33.33%的用户
 * 通过测试用例：26 / 26
 *
 * 递归用时
 * 执行用时：44 ms, 在所有 PHP 提交中击败了33.33%的用户
 * 内存消耗：24.7 MB, 在所有 PHP 提交中击败了33.33%的用户
 * 通过测试用例：26 / 26
 */