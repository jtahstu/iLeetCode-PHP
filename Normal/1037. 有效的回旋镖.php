<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/8 14:46
 * Des: 1037. 有效的回旋镖
 *      https://leetcode.cn/problems/valid-boomerang/
 *      给定一个数组 points ，其中 points[i] = [xi, yi] 表示 X-Y 平面上的一个点，如果这些点构成一个 回旋镖 则返回 true 。
 *      回旋镖 定义为一组三个点，这些点 各不相同 且 不在一条直线上 。
 */

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Boolean
     */
    function isBoomerang($points)
    {
        if ($points[0] == $points[1] || $points[1] == $points[2] || $points[0] == $points[2]) return false;
        $k1 = ($points[1][0] - $points[0][0]) ? ($points[1][1] - $points[0][1]) / ($points[1][0] - $points[0][0]) : PHP_INT_MAX;
        $k2 = ($points[2][0] - $points[1][0]) ? ($points[2][1] - $points[1][1]) / ($points[2][0] - $points[1][0]) : PHP_INT_MAX;
        $k3 = ($points[2][0] - $points[0][0]) ? ($points[2][1] - $points[0][1]) / ($points[2][0] - $points[0][0]) : PHP_INT_MAX;
        if ($k1 == $k2 && $k2 == $k3) return false;
        return true;
    }
}

/**
 * 注意下除以0的情况
 * 还可以算面积, 算2个向量的乘积
 * 执行用时：4 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：206 / 206
 */