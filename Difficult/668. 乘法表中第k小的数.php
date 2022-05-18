<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/18 10:00
 * Des: 668. 乘法表中第k小的数
 *      https://leetcode.cn/problems/kth-smallest-number-in-multiplication-table/
 */

class Solution
{

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findKthNumber($m, $n, $k)
    {
        $l = 1;
        $r = $n * $m;
        while ($l != $r) {
            $mid = intval($r - ($r - $l) / 2);
            $count = 0;
            for ($i = 1; $i <= $m; $i++) {
                $count += min($n, intval($mid / $i));
            }
            if ($count < $k) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
        }
        return $r;
    }
}

var_dump((new Solution)->findKthNumber(3, 4, 5));
var_dump((new Solution)->findKthNumber(2, 3, 6));

/**
 * 我们无法把全部数字都求出来, 然后排序二分找到第k个
 * 但是我们可以算 某一个数字前面有多少个小于它的数量, 那么就是二分枚举1 ~ n*m, 就找嘛
 * 比如1 ~ 200, 我先看<=100的有多少个数字, 小于k个那就是值取小了, 那么我们就再看150, 大于k个就是取大了, 我们就看125
 * 终归当l==r, 我们能找到那个恰好是小于k个数字的mid值, 他就是此时的l或r, 即要找的数
 * 执行用时：164 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：70 / 70
 */