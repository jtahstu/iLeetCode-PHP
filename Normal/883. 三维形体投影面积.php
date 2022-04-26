<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/26 22:24
 * Des: 883. 三维形体投影面积
 *      https://leetcode-cn.com/problems/projection-area-of-3d-shapes/
 *      在 n x n 的网格 grid 中，我们放置了一些与 x，y，z 三轴对齐的 1 x 1 x 1 立方体。
 * 每个值 v = grid[i][j] 表示 v 个正方体叠放在单元格 (i, j) 上。
 * 现在，我们查看这些立方体在 xy 、yz 和 zx 平面上的投影。
 * 投影 就像影子，将 三维 形体映射到一个 二维 平面上。从顶部、前面和侧面看立方体时，我们会看到“影子”。
 * 返回 所有三个投影的总面积 。
 */

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function projectionArea($grid)
    {
        $x = $y = $z = 0;
        $index_max = [];
        foreach ($grid as $row) {
            $max = -1;
            foreach ($row as $k => $count) {
                $z += $count > 0 ? 1 : 0;
                $max = max($max, $count);
                $index_max[$k][] = $count;
            }
            $x += $max;
        }
        foreach ($index_max as $y_max) {
            $y += max($y_max);
        }
//        print_r([$x, $y, $z]);
        return $x + $y + $z;
    }
}

var_dump((new Solution())->projectionArea([[1, 2], [3, 4]]));
var_dump((new Solution())->projectionArea([[2]]));
var_dump((new Solution())->projectionArea([[1, 0], [0, 2]]));

/**
 * 执行用时：24 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：90 / 90
 */