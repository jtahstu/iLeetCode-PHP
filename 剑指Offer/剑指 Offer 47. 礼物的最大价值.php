<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/14 21:18
 * Des: 剑指 Offer 47. 礼物的最大价值
 *      https://leetcode.cn/problems/li-wu-de-zui-da-jie-zhi-lcof/
 *      在一个 m*n 的棋盘的每一格都放有一个礼物，每个礼物都有一定的价值（价值大于 0）。你可以从棋盘的左上角开始拿格子里的礼物，并每次向右或者向下移动一格、直到到达棋盘的右下角。给定一个棋盘及其上面的礼物的价值，请计算你最多能拿到多少价值的礼物？
 */

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxValue($grid)
    {
        $dp = [[0]];
        $n = count($grid);
        $m = count($grid[0]);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                //这里$i-1可能会越界成-1, 但是竟然没报Notice, 就很神奇
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]) + $grid[$i][$j];
            }
        }
//        print_r($dp);
        return $dp[$n - 1][$m - 1];
    }
}

var_dump((new Solution)->maxValue([[1, 3, 1], [1, 5, 1], [4, 2, 1]]));


/**
 * 1 4 5
 * 2 9 10
 * 6 11 12
 */
/**
 * 执行用时：24 ms, 在所有 PHP 提交中击败了89.47%的用户
 * 内存消耗：22.2 MB, 在所有 PHP 提交中击败了28.95%的用户
 * 通过测试用例：61 / 61
 */