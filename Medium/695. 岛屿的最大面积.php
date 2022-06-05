<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/6 1:31
 * Des: 695. 岛屿的最大面积
 *      https://leetcode.cn/problems/max-area-of-island/
 *      给你一个大小为 m x n 的二进制矩阵 grid 。
 *      岛屿 是由一些相邻的 1 (代表土地) 构成的组合，这里的「相邻」要求两个 1 必须在 水平或者竖直的四个方向上 相邻。你可以假设 grid 的四个边缘都被 0（代表水）包围着。
 *      岛屿的面积是岛上值为 1 的单元格的数目。
 *      计算并返回 grid 中最大的岛屿面积。如果没有岛屿，则返回面积为 0 。
 */

class Solution
{
    public $grid = [];
    public $visited = [];
    public $n = 0;
    public $m = 0;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $this->grid = $grid;
        $this->n = count($grid);
        $this->m = count($grid[0]);
        $max_area = 0;
        for ($i = 0; $i < $this->n; $i++) {
            for ($j = 0; $j < $this->m; $j++) {
                //不是岛屿或者访问过得pass
                if ($grid[$i][$j] == 0 || isset($this->visited[$i][$j])) continue;
                $max_area = max($max_area, $this->bfs($i, $j));
            }
        }
//        echo json_encode($this->visited);
        return $max_area;
    }

    function bfs($i, $j)
    {
        //i,j改点先算上
        $area = 1;
        $this->visited[$i][$j] = 1;
        $paths = [[0, 1], [0, -1], [1, 0], [-1, 0]];
        $items = [[$i, $j]];
        //广搜
        while ($items) {
            $item = array_shift($items);
            foreach ($paths as $path) {
                $x = $item[0] + $path[0];
                $y = $item[1] + $path[1];
                if ($x < 0 || $y < 0 || $x >= $this->n || $y >= $this->m || isset($this->visited[$x][$y]) || $this->grid[$x][$y] != 1) continue;
                $area++;
                $this->visited[$x][$y] = 1;
                $items[] = [$x, $y];
            }
        }
        return $area;
    }
}

/**
 * 可以, 写的很熟练, 基本一遍过
 * 执行用时：40 ms, 在所有 PHP 提交中击败了69.57%的用户
 * 内存消耗：19.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：728 / 728
 */