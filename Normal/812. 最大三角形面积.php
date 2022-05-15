<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 17:47
 * Des: 812. 最大三角形面积
 *      https://leetcode.cn/problems/largest-triangle-area/
 *      给定包含多个点的集合，从其中取三个点组成三角形，返回能组成的最大三角形的面积。
 */

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Float
     */
    function largestTriangleArea($points)
    {
        $max = 0;
        $n = count($points);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                for ($k = $j + 1; $k < $n; $k++) {
                    $area = $this->cross($points[$j][0] - $points[$i][0], $points[$j][1] - $points[$i][1], $points[$k][0] - $points[$i][0], $points[$k][1] - $points[$i][1]);
                    $max = max($max, abs($area / 2));
                }
            }
        }
        return $max;
    }

    function cross($a, $b, $c, $d)
    {
        return $a * $d - $c * $b;
    }
}

/**
 * 执行用时：40 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：57 / 57
 */