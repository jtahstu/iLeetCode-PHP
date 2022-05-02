<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/2 20:13
 * Des: 807. 保持城市天际线
 *      https://leetcode.cn/problems/max-increase-to-keep-city-skyline/
 *      给你一座由 n x n 个街区组成的城市，每个街区都包含一座立方体建筑。给你一个下标从 0 开始的 n x n 整数矩阵 grid ，其中 grid[r][c] 表示坐落于 r 行 c 列的建筑物的 高度 。
 *      城市的 天际线 是从远处观察城市时，所有建筑物形成的外部轮廓。从东、南、西、北四个主要方向观测到的 天际线 可能不同。
 *      我们被允许为 任意数量的建筑物 的高度增加 任意增量（不同建筑物的增量可能不同） 。 高度为 0 的建筑物的高度也可以增加。然而，增加的建筑物高度 不能影响 从任何主要方向观察城市得到的 天际线 。
 *      在 不改变 从任何主要方向观测到的城市 天际线 的前提下，返回建筑物可以增加的 最大高度增量总和 。
 */

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxIncreaseKeepingSkyline($grid)
    {
        $row_max = $col_max = [];
        $n = count($grid);
        //取每行最大值
        foreach ($grid as $r => $rows) {
            $row_max[$r] = max($rows);
        }
        //取每列最大值
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $col_max[$i] = max($col_max[$i] ?? 0, $grid[$j][$i]);
            }
        }
        $count = 0;
        //可以整加到对应行和列较小值的数量
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $count += min($row_max[$i], $col_max[$j]) - $grid[$i][$j];
            }
        }
//        print_r($row_max);
//        print_r($col_max);
        return $count;
    }
}

var_dump((new Solution())->maxIncreaseKeepingSkyline([[3,0,8,4],[2,4,5,7],[9,2,6,3],[0,3,1,0]]));

/**
 * 执行用时：20 ms, 在所有 PHP 提交中击败了71.43%的用户
 * 内存消耗：19.3 MB, 在所有 PHP 提交中击败了14.29%的用户
 * 通过测试用例：133 / 133
 */