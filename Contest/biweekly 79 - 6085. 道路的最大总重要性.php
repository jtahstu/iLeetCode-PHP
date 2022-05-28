<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 22:19
 * Des: 6085. 道路的最大总重要性
 *      https://leetcode.cn/contest/biweekly-contest-79/problems/maximum-total-importance-of-roads/
 */

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function maximumImportance($n, $roads)
    {
        $list = [];
        foreach ($roads as $road) {
            $list[$road[0]] = isset($list[$road[0]]) ? $list[$road[0]] + 1 : 1;
            $list[$road[1]] = isset($list[$road[1]]) ? $list[$road[1]] + 1 : 1;
        }

        asort($list);
//        print_r($list);
        $list = array_reverse($list, true);
        $i = $n;
        foreach ($list as $key => $value) {
            $list[$key] = $i;
            $i--;
        }
        $ans = 0;
        foreach ($roads as $road) {
            $ans += $list[$road[0]] + $list[$road[1]];
        }
        return $ans;
    }
}

//这个太可惜了, 没理解题意, 前两次提交都没考虑完整, 还是看错误案例再调出来的
var_dump((new Solution())->maximumImportance(5, [[0, 1], [1, 2], [2, 3], [0, 2], [1, 3], [2, 4]]));//43
var_dump((new Solution())->maximumImportance(5, [[0, 1]]));//9
var_dump((new Solution())->maximumImportance(8, [[1, 0], [2, 0], [3, 0], [4, 0], [5, 1], [6, 1], [7, 1], [2, 1]]));//95