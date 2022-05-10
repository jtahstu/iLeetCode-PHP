<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/10 15:36
 * Des: 剑指 Offer 04. 二维数组中的查找
 *      https://leetcode.cn/problems/er-wei-shu-zu-zhong-de-cha-zhao-lcof/
 *      240. 搜索二维矩阵 II
 *      https://leetcode.cn/problems/search-a-2d-matrix-ii/
 *      在一个 n * m 的二维数组中，每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。请完成一个高效的函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
 */

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray($matrix, $target)
    {
        if (!$matrix || !count($matrix) || !count($matrix[0])) {
            return false;
        }
        $n = count($matrix);
        $m = count($matrix[0]);
        $i = 0;
        $j = $m - 1;
        while ($i < $n && $j >= 0) {
            $x = $matrix[$i][$j];
            if ($x == $target) {
                return true;
            } elseif ($x > $target) {  //大于目标值往左
                $j--;
            } else {  //小于目标值往下
                $i++;
            }
        }
        return false;

        /**
         * 执行用时：76 ms, 在所有 PHP 提交中击败了5.77%的用户
         * 内存消耗：24.7 MB, 在所有 PHP 提交中击败了69.23%的用户
         * 通过测试用例：129 / 129
         */

        /**
         * 下面自己想的解法, 速度竟然更快? 不敢相信
         * 执行用时：52 ms, 在所有 PHP 提交中击败了53.85%的用户
         * 内存消耗：25.1 MB, 在所有 PHP 提交中击败了5.77%的用户
         * 通过测试用例：129 / 129
         */
    }

    //自己想的, 不算快
    function findNumberIn2DArray2($matrix, $target)
    {
        $n = count($matrix);
        if ($n == 0) {
            return false;
        }
        $m = count($matrix[0]);
        if ($m == 0) {
            return false;
        }
        for ($i = 0; $i < $n; $i++) {
            if ($matrix[$i][0] > $target) {
                break;
            }
            $matrix[$i] = array_slice($matrix[$i], 0, $m);
            $row = $this->binary_search($matrix[$i], $target);
//            echo $row . PHP_EOL;
//            echo implode(" ", $matrix[$i]) . PHP_EOL;
            if ($row == PHP_INT_MAX) {
                return true;
            } else {
                $m = $row;
            }
        }
        return false;
    }

    function binary_search($nums, $target)
    {
        $l = 0;
        $r = count($nums) - 1;
        while ($l <= $r) {
            $mid = intval(($l + $r) / 2);
            $v = $nums[$mid];
            if ($target == $v) {
                return PHP_INT_MAX;
            }
            if ($v > $target) {
                $r = $mid - 1;
            }
            if ($v < $target) {
                $l = $mid + 1;
            }
        }
        return $l;
    }
}

$a = [
    [1, 4, 7, 11, 15],
    [2, 5, 8, 12, 19],
    [3, 6, 9, 16, 22],
    [10, 13, 14, 17, 24],
    [18, 21, 23, 26, 30]
];
var_dump((new Solution)->findNumberIn2DArray($a, 16));
var_dump((new Solution)->findNumberIn2DArray($a, 20));

/**
 * 执行用时：48 ms, 在所有 PHP 提交中击败了88.16%的用户
 * 内存消耗：24.9 MB, 在所有 PHP 提交中击败了28.95%的用户
 * 通过测试用例：129 / 129
 */


//原来是从右上往左下遍历呀, 没想到没想到
//class Solution {
//    public boolean findNumberIn2DArray(int[][] matrix, int target) {
//        if (matrix == null || matrix.length == 0 || matrix[0].length == 0) {
//            return false;
//        }
//        int rows = matrix.length, columns = matrix[0].length;
//        int row = 0, column = columns - 1;
//        while (row < rows && column >= 0) {
//            int num = matrix[row][column];
//            if (num == target) {
//                return true;
//            } else if (num > target) {
//                column--;
//            } else {
//                row++;
//            }
//        }
//        return false;
//    }
//}