<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 20:17
 * Des: 566. 重塑矩阵
 *      https://leetcode.cn/problems/reshape-the-matrix/
 *      在 MATLAB 中，有一个非常有用的函数 reshape ，它可以将一个 m x n 矩阵重塑为另一个大小不同（r x c）的新矩阵，但保留其原始数据。
 *      给你一个由二维数组 mat 表示的 m x n 矩阵，以及两个正整数 r 和 c ，分别表示想要的重构的矩阵的行数和列数。
 *      重构后的矩阵需要将原始矩阵的所有元素以相同的 行遍历顺序 填充。
 *      如果具有给定参数的 reshape 操作是可行且合理的，则输出新的重塑矩阵；否则，输出原始矩阵。
 */

class Solution
{

    /**
     * @param Integer[][] $mat
     * @param Integer $r
     * @param Integer $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c)
    {
        $n = count($mat);
        $m = count($mat[0]);
        if ($n * $m != $r * $c) return $mat;
        $list = [];
        foreach (array_values($mat) as $arr) {
            $list = array_merge($list, $arr);
        }
        $res = [];
        for ($i = 0; $i < count($list); $i++) {
            $row = intval($i / $c);
            $col = $i % $c;
            $res[$row][$col] = $list[$i];
        }
        return $res;
    }
}

/**
 * 执行用时：28 ms, 在所有 PHP 提交中击败了61.90%的用户
 * 内存消耗：20.8 MB, 在所有 PHP 提交中击败了33.33%的用户
 * 通过测试用例：57 / 57
 */