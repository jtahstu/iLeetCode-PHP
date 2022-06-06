<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/7 0:07
 * Des: 994. 腐烂的橘子
 *      https://leetcode.cn/problems/rotting-oranges/
 *      在给定的 m x n 网格 grid 中，每个单元格可以有以下三个值之一：
 *        值 0 代表空单元格；
 *        值 1 代表新鲜橘子；
 *        值 2 代表腐烂的橘子。
 *      每分钟，腐烂的橘子 周围 4 个方向上相邻 的新鲜橘子都会腐烂。
 *      返回 直到单元格中没有新鲜橘子为止所必须经过的最小分钟数。如果不可能，返回 -1 。
 */

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid)
    {
        $n = count($grid);
        $m = count($grid[0]);
        $minute = 0;
        $items = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if ($grid[$i][$j] == 2) {
                    $items[] = [$i, $j];
                }
            }
        }

        $paths = [[0, 1], [0, -1], [1, 0], [-1, 0]];
        //广搜
        while ($items) {
            $nodes = [];
            $minute_tmp = $minute;
            foreach ($items as $item) {
                foreach ($paths as $path) {
                    $x = $item[0] + $path[0];
                    $y = $item[1] + $path[1];
                    if ($x < 0 || $y < 0 || $x >= $n || $y >= $m || $grid[$x][$y] != 1) continue;
                    if ($minute == $minute_tmp) $minute++;  //每轮只有有符合的点, 就只加一次
                    $grid[$x][$y] = 2;  //把grid的值当visited数组用
                    $nodes[] = [$x, $y];
                }
            }
            $items = $nodes;
        }

        //    echo json_encode($grid);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if ($grid[$i][$j] == 1) {
                    $minute = -1;
                    break 2;
                }
            }
        }
        return $minute;
    }
}

/**
 * 一遍过
 * 执行用时：16 ms, 在所有 PHP 提交中击败了53.33%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了33.33%的用户
 * 通过测试用例：306 / 306
 *
 * 不要visited数组后的速度
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了46.67%的用户
 * 通过测试用例：306 / 306
 */