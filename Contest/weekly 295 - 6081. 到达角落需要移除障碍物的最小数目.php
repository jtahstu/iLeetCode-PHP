<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 10:23
 * Des: 6081. 到达角落需要移除障碍物的最小数目
 *      https://leetcode.cn/problems/minimum-obstacle-removal-to-reach-corner/
 *      给你一个下标从 0 开始的二维整数数组 grid ，数组大小为 m x n 。每个单元格都是两个值之一：
 *          0 表示一个 空 单元格，
 *          1 表示一个可以移除的 障碍物 。
 *      你可以向上、下、左、右移动，从一个空单元格移动到另一个空单元格。
 *      现在你需要从左上角 (0, 0) 移动到右下角 (m - 1, n - 1) ，返回需要移除的障碍物的 最小 数目。
 */

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumObstacles($grid) {
        $n = count($grid);
        $m = count($grid[0]);
        $cnt = 0;
        $items = [[0, 0, $cnt]];
        $paths = [[1, 0], [0, 1]]; // [[1, 0], [-1, 0], [0, 1], [0, -1]]
        $min = PHP_INT_MAX;
        while ($items) {
            $cur = array_shift($items);
            echo $cur[0] . ',' . $cur[1] . ' ';
            foreach ($paths as $path) {
                $v = [$cur[0] + $path[0], $cur[1] + $path[1], $cur[2]];
                if($grid[$v[0]][$v[1]]==1 ) {
                    $v[2]++;
                }
                if($v[0]==$n-1 && $v[1]==$m-1) {
                    $min = min($min, $v[2]);
                }
                if ($v[0] >= 0 && $v[1] >= 0 && $v[0] < $m && $v[1] < $n) {
                    $items[] = $v;
                }
            }
        }
        return $min;
    }
}

var_dump((new Solution)->minimumObstacles([[0,1,1],[1,1,0],[1,1,0]]));
var_dump((new Solution)->minimumObstacles([[0,1,0,0,0],[0,1,0,1,0],[0,0,0,1,0]]));

//是一个路径搜索, 1还能干掉, 相当于每条路径都有个visited数组
//要是1不走的话就简单很多, 直接搜到结尾就好了