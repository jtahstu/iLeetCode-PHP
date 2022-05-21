<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/21 16:33
 * Des: 1769. 移动所有球到每个盒子所需的最小操作数
 *      https://leetcode.cn/problems/minimum-number-of-operations-to-move-all-balls-to-each-box/
 *      返回一个长度为 n 的数组 answer ，其中 answer[i] 是将所有小球移动到第 i 个盒子所需的 最小 操作数。
 */

class Solution
{

    /**
     * @param String $boxes
     * @return Integer[]
     */
    function minOperations($boxes)
    {
        $box_i = [];
        $n = strlen($boxes);
        for ($i = 0; $i < $n; $i++) {
            if ($boxes[$i] == '1') {
                $box_i[] = $i;
            }
        }
        $res = [];
        for ($i = 0; $i < $n; $i++) {
            $res[$i] = 0;
            foreach ($box_i as $j) {
                $res[$i] += abs($i - $j);
            }
        }
        return $res;
    }
}

/**
 * 纯暴力都双100, 离谱
 * 我擦, 看题解这都可以动态规划, dp[j] = dp[j-1] - right + left
 * 执行用时：604 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：95 / 95
 */