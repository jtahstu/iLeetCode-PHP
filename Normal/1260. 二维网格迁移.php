<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/20 18:21
 * Desc: 1260. 二维网格迁移
 *      https://leetcode.cn/problems/shift-2d-grid/
 *      给你一个 m 行 n 列的二维网格 grid 和一个整数 k。你需要将 grid 迁移 k 次。
 *      每次「迁移」操作将会引发下述活动：
 *          位于 grid[i][j] 的元素将会移动到 grid[i][j + 1]。
 *          位于 grid[i][n - 1] 的元素将会移动到 grid[i + 1][0]。
 *          位于 grid[m - 1][n - 1] 的元素将会移动到 grid[0][0]。
 *      请你返回 k 次迁移操作后最终得到的 二维网格。
 */

class Solution
{

    /**
     * @param Integer[][] $grid
     * @param Integer     $k
     * @return Integer[][]
     */
    function shiftGrid($grid, $k)
    {
        $n = count($grid);
        $m = count($grid[0]);
        $k = $k % ($n * $m);  //注意这里要取个模
        $nums = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $nums[] = $grid[$i][$j];
            }
        }
        $nums_res = array_merge(array_slice($nums, $n * $m - $k, $k), array_slice($nums, 0, $n * $m - $k));
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $grid[$i][$j] = $nums_res[$i * $m + $j];
            }
        }
        return $grid;
    }
}

/**
 * 执行用时：44 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：107 / 107
 */