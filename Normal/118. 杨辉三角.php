<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 20:33
 * Des: 118. 杨辉三角
 *      https://leetcode.cn/problems/pascals-triangle/
 *      给定一个非负整数 numRows，生成「杨辉三角」的前 numRows 行。
 *      在「杨辉三角」中，每个数是它左上方和右上方的数的和。
 */

class Solution
{

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        $res = [];
        for ($i = 0; $i < $numRows; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                if ($j == 0 || $j == $i) {
                    $res[$i][$j] = 1;
                    continue;
                }
                $res[$i][$j] = $res[$i - 1][$j] + $res[$i-1][$j - 1];
            }
        }
        return $res;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了6.67%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了68.89%的用户
 * 通过测试用例：14 / 14
 */