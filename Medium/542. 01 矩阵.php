<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/6 19:16
 * Des: 542. 01 矩阵
 *      https://leetcode.cn/problems/01-matrix/
 *      给定一个由 0 和 1 组成的矩阵 mat ，请输出一个大小相同的矩阵，其中每一个格子是 mat 中对应位置元素到最近的 0 的距离。
 *      两个相邻元素间的距离为 1 。
 */

class Solution
{

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function updateMatrix($mat)
    {
        $ans = [];
        $n = count($mat);
        $m = count($mat[0]);
        $queue = [];
        $depth = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if ($mat[$i][$j] == 0) {
                    $queue[] = [$i, $j];
                    $ans[$i][$j] = $depth;
                } else {
                    //这里得给值, 不能说后面用isset判断, hash数组key是按$i复制顺序展示的, 会导致ans的key不连续
                    $ans[$i][$j] = -1;
                }
            }
        }
        $paths = [[-1, 0], [1, 0], [0, -1], [0, 1]];
        while ($queue) {
            $depth++;
            $nodes = [];
            foreach ($queue as $item) {
                foreach ($paths as $path) {
                    $x = $item[0] + $path[0];
                    $y = $item[1] + $path[1];
                    if ($x >= 0 && $x < $n && $y >= 0 && $y < $m && $ans[$x][$y] == -1 && $mat[$x][$y] == 1) {
                        $ans[$x][$y] = $depth;
                        $nodes[] = [$x, $y];
                    }
                }
            }
            $queue = $nodes;
        }
        return $ans;
    }
}

echo json_encode((new Solution)->updateMatrix([[0, 1, 0, 1, 1], [1, 1, 0, 0, 1], [0, 0, 0, 1, 0], [1, 0, 1, 1, 1], [1, 0, 0, 0, 1]]));

/**
 * 从0位置开始往外广搜
 * 执行用时：204 ms, 在所有 PHP 提交中击败了62.50%的用户
 * 内存消耗：34 MB, 在所有 PHP 提交中击败了37.50%的用户
 * 通过测试用例：50 / 50
 */