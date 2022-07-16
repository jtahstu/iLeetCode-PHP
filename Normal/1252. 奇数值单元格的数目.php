<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/12 16:16
 * Desc: 1252. 奇数值单元格的数目
 *      https://leetcode.cn/problems/cells-with-odd-values-in-a-matrix/
 *      给你一个 m x n 的矩阵，最开始的时候，每个单元格中的值都是 0。
 *      另有一个二维索引数组 indices，indices[i] = [ri, ci] 指向矩阵中的某个位置，其中 ri 和 ci 分别表示指定的行和列（从 0 开始编号）。
 *      对 indices[i] 所指向的每个位置，应同时执行下述增量操作：
 *          ri 行上的所有单元格，加 1 。
 *          ci 列上的所有单元格，加 1 。
 *      给你 m、n 和 indices 。请你在执行完所有 indices 指定的增量操作后，返回矩阵中 奇数值单元格 的数目。
 */

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer[][] $indices
     * @return Integer
     */
    function oddCells($m, $n, $indices) {
        $arr = array_fill(0, $m, array_fill(0, $n, 0));
        foreach ($indices as $index) {
            $i = $index[0];
            $j = $index[1];
            for ($k = 0; $k < $m; $k++) {
                $arr[$k][$j]++;
            }
            for ($k = 0; $k < $n; $k++) {
                $arr[$i][$k]++;
            }
        }
        $count = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($arr[$i][$j] & 1) $count++;
            }
        }
        return $count;
    }
}

/**
 * 读题是真费劲啊
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：44 / 44
 */