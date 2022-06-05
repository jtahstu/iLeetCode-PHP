<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/2 23:23
 * Des: 733. 图像渲染
 *      https://leetcode.cn/problems/flood-fill/
 *      有一幅以 m x n 的二维整数数组表示的图画 image ，其中 image[i][j] 表示该图画的像素值大小。
 *      你也被给予三个整数 sr ,  sc 和 newColor 。你应该从像素 image[sr][sc] 开始对图像进行 上色填充 。
 *      为了完成 上色工作 ，从初始像素开始，记录初始坐标的 上下左右四个方向上 像素值与初始坐标相同的相连像素点，接着再记录这四个方向上符合条件的像素点与他们对应 四个方向上 像素值与初始坐标相同的相连像素点，……，重复该过程。将所有有记录的像素点的颜色值改为 newColor 。
 *      最后返回 经过上色渲染后的图像 。
 */

class Solution
{

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $newColor
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $newColor)
    {
        $n = count($image);
        $m = count($image[0]);
        $items = [[$sr, $sc]];
        $old_color = $image[$sr][$sc];
        if ($old_color == $newColor) return $image;
        $visitd = [];
        while ($items) {
            list($r, $c) = array_shift($items);
            $image[$r][$c] = $newColor;
            $visitd[$r][$c] = 1;
            foreach ([[1, 0], [-1, 0], [0, 1], [0, -1]] as $path) {
                $nr = $r + $path[0];
                $nc = $c + $path[1];
                if ($nr < 0 || $nc < 0 || $nr >= $n || $nc >= $m || $image[$nr][$nc] != $old_color || isset($visitd[$nr][$nc])) continue;
                $items[] = [$nr, $nc];
            }
        }
        return $image;
    }
}

/**
 * bfs
 * 执行用时：16 ms, 在所有 PHP 提交中击败了91.30%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了86.96%的用户
 * 通过测试用例：277 / 277
 */