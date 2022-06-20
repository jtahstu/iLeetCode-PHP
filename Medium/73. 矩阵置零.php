<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 18:09
 * Desc: 73. 矩阵置零
 *       https://leetcode.cn/problems/set-matrix-zeroes/
 *       给定一个 m x n 的矩阵，如果一个元素为 0 ，则将其所在行和列的所有元素都设为 0 。请使用 原地 算法。
 */

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix)
    {
        $rows = $cols = [];
        $n = count($matrix);
        $m = count($matrix[0]);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if ($matrix[$i][$j] == 0) {
                    $rows[] = $i;
                    $cols[] = $j;
                }
            }
        }
        $rows = array_unique($rows);
        $cols = array_unique($cols);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if (in_array($i, $rows) || in_array($j, $cols)) {
                    $matrix[$i][$j] = 0;
                }
            }
        }
    }
}

/**
 * 执行用时：40 ms, 在所有 PHP 提交中击败了55.88%的用户
 * 内存消耗：22.7 MB, 在所有 PHP 提交中击败了73.53%的用户
 * 通过测试用例：164 / 164
 */