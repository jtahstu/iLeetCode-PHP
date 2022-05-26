<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 7:52
 * Des: 699. 掉落的方块
 *      https://leetcode.cn/problems/falling-squares/
 *      在无限长的数轴（即 x 轴）上，我们根据给定的顺序放置对应的正方形方块。
 *      第 i 个掉落的方块（positions[i] = (left, side_length)）是正方形，其中 left 表示该方块最左边的点位置(positions[i][0])，side_length 表示该方块的边长(positions[i][1])。
 *      每个方块的底部边缘平行于数轴（即 x 轴），并且从一个比目前所有的落地方块更高的高度掉落而下。在上一个方块结束掉落，并保持静止后，才开始掉落新方块。
 *      方块的底边具有非常大的粘性，并将保持固定在它们所接触的任何长度表面上（无论是数轴还是其他方块）。邻接掉落的边不会过早地粘合在一起，因为只有底边才具有粘性。
 *      返回一个堆叠高度列表 ans 。每一个堆叠高度 ans[i] 表示在通过 positions[0], positions[1], ..., positions[i] 表示的方块掉落结束后，目前所有已经落稳的方块堆叠的最高高度。
 */

class Solution
{

    /**
     * @param Integer[][] $positions
     * @return Integer[]
     */
    function fallingSquares($positions)
    {
        $n = count($positions);
        $heights = [];
        foreach ($positions as $k => $v) {
            // 第一个方块直接录入heights
            $left1 = $v[0];
            // 计算方块右边坐标
            // 因为 v[1] 是方块边长 v[0] 是方块最左边点的位置
            // 边长包括了方块左边 需要重合 -1
            $right1 = $v[0] + $v[1] - 1;
            $heights[$k] = $v[1];
            // 第一个方块直接代表高度
            for ($j = 0; $j < $k; $j++) {
                // 前一个方块的左右坐标
                $left2 = $positions[$j][0];
                $right2 = $positions[$j][0] + $positions[$j][1] - 1;
                // 当 方块 v 在前面方块的 右边
                // 并且 前一方块与当前 方块 v 的左坐标有重合可粘合
                // 更新方块 v 的高度
                if ($right1 >= $left2 && $right2 >= $left1) {
                    // 前面粘合的方块可能有多个 取最大
                    $heights[$k] = max($heights[$k], $heights[$j] + $positions[$k][1]);
                }
            }
        }
        for ($i = 1; $i < $n; $i++) {
            $heights[$i] = max($heights[$i], $heights[$i - 1]);
        }
        return $heights;
    }
}