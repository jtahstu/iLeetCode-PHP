<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/30 14:04
 * Des: 剑指 Offer 29. 顺时针打印矩阵
 *      https://leetcode.cn/problems/shun-shi-zhen-da-yin-ju-zhen-lcof/
 *      输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字。
 */

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix)
    {
        $row = count($matrix);
        if ($row == 0) return [];
        $col = count($matrix[0]);
        $ans = [];
        $u = $l = 0;
        $d = $row - 1;
        $r = $col - 1;
        while (true) {
            // top left to right
            for ($i = $l; $i <= $r; ++$i) $ans[] = $matrix[$u][$i];
            // delete top row
            if (++$u > $d) break;
            // right top to bottom
            for ($i = $u; $i <= $d; ++$i) $ans[] = $matrix[$i][$r];
            // delete right col
            if (--$r < $l) break;
            // bottom right to left
            for ($i = $r; $i >= $l; --$i) $ans[] = $matrix[$d][$i];
            // delete bottom row
            if (--$d < $u) break;
            // left bottom to top
            for ($i = $d; $i >= $u; --$i) $ans[] = $matrix[$i][$l];
            // delete left col
            if (++$l > $r) break;
        }
        return $ans;
    }
}

/**
 * cv大法, 题意是简单, 调参调到死
 * 执行用时：28 ms, 在所有 PHP 提交中击败了86.67%的用户
 * 内存消耗：21.5 MB, 在所有 PHP 提交中击败了46.67%的用户
 * 通过测试用例：27 / 27
 */