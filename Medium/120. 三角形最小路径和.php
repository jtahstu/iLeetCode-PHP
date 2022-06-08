<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/8 22:28
 * Des: 120. 三角形最小路径和
 *      https://leetcode.cn/problems/triangle/
 *      给定一个三角形 triangle ，找出自顶向下的最小路径和。
 *      每一步只能移动到下一行中相邻的结点上。相邻的结点 在这里指的是 下标 与 上一层结点下标 相同或者等于 上一层结点下标 + 1 的两个结点。也就是说，如果正位于当前行的下标 i ，那么下一步可以移动到下一行的下标 i 或 i + 1 。
 */

class Solution
{

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle)
    {
        $dp = [];
        for ($i = 0; $i < count($triangle); $i++) {
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                $dp[$i][$j] = $triangle[$i][$j];
                $t1 = $t2 = PHP_INT_MAX;
                if (isset($dp[$i - 1][$j])) $t1 = $dp[$i - 1][$j];
                if (isset($dp[$i - 1][$j - 1])) $t2 = $dp[$i - 1][$j - 1];
                $dp[$i][$j] += $t1 == $t2 && $t1 == PHP_INT_MAX ? 0 : min($t1, $t2);
            }
        }
        // print_r($dp);
        return min($dp[count($triangle) - 1]);
    }
}

/**
 * 从底部往上推得话就是 dp[i][j]=min(dp[i+1][j],dp[i+1][j+1])+triangle[i][j]
 * 从上往下就是要多考虑边界不存在的问题, 也还好吧
 *
 * 执行用时：28 ms, 在所有 PHP 提交中击败了18.18%的用户
 * 内存消耗：20.9 MB, 在所有 PHP 提交中击败了36.36%的用户
 * 通过测试用例：44 / 44
 */