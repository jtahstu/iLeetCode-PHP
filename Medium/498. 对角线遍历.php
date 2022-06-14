<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/14 11:12
 * Des: 498. 对角线遍历
 *      https://leetcode.cn/problems/diagonal-traverse/
 *      给你一个大小为 m x n 的矩阵 mat ，请以对角线遍历的顺序，用一个数组返回这个矩阵中的所有元素。
 */

class Solution
{

    /**
     * @param Integer[][] $mat
     * @return Integer[]
     */
    function findDiagonalOrder($mat)
    {
        $n = count($mat);
        $m = count($mat[0]);
        $i = $j = 0;
        $res = [];
        $f = 1;
        $count = 0;
        while ($count < $n * $m) {
            $res[$count++] = $mat[$i][$j];
            if ($f == 1) { //右上
                $ni = $i - 1;
                $nj = $j + 1;
            } else {  //左下
                $ni = $i + 1;
                $nj = $j - 1;
            }
            if ($count < $n * $m && ($ni < 0 || $ni >= $n || $nj < 0 || $nj >= $m)) {
                if ($f == 1) { //右上
                    $ni = $j + 1 < $m ? $i : $i + 1;
                    $nj = $j + 1 < $m ? $j + 1 : $j;
                } else { //左下
                    $ni = $i + 1 < $n ? $i + 1 : $i;
                    $nj = $i + 1 < $n ? $j : $j + 1;
                }
                $f *= -1;
            }
            $i = $ni;
            $j = $nj;
        }
        return $res;
    }
}

print_r((new Solution)->findDiagonalOrder([[1, 2, 3], [4, 5, 6], [7, 8, 9]]));
//print_r((new Solution)->findDiagonalOrder([[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]]));

/**
 * 执行用时：60 ms, 在所有 PHP 提交中击败了75.00%的用户
 * 内存消耗：29.2 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：32 / 32
 */