<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/20 14:08
 * Desc: 198. 打家劫舍
 *      https://leetcode.cn/problems/house-robber/
 *      你是一个专业的小偷，计划偷窃沿街的房屋。每间房内都藏有一定的现金，影响你偷窃的唯一制约因素就是相邻的房屋装有相互连通的防盗系统，如果两间相邻的房屋在同一晚上被小偷闯入，系统会自动报警。
 *      给定一个代表每个房屋存放金额的非负整数数组，计算你 不触动警报装置的情况下 ，一夜之内能够偷窃到的最高金额。
 */

class Solution
{

    public $list = [];
    public $n = 0;

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        $this->n = count($nums);
        $this->list = array_fill(0, $this->n, -1);
        $res = $this->dp($nums, 0);
//        print_r($this->list);
        return $res;
    }

    public function dp(&$nums, $start)
    {
        if ($start >= $this->n) return 0;
        if ($this->list[$start] != -1) return $this->list[$start];
        $res = max($this->dp($nums, $start + 1), $nums[$start] + $this->dp($nums, $start + 2));
        $this->list[$start] = $res;
        return $res;
    }
}

var_dump((new Solution)->rob([2,7,9,3,1]));

/**
 * 动态规划
 * 1. int res = Math.max(
                // 不抢，去下家
                dp(nums, start + 1),
                // 抢，去下下家
                nums[start] + dp(nums, start + 2)
            );
 * 2. $dp[$i] = max($dp[$i-2]+$nums[$i], $dp[$i-3]+$nums[$i]), 取最后2个值中的最大值
 *
 * 执行用时：4 ms, 在所有 PHP 提交中击败了80.95%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了58.73%的用户
 * 通过测试用例：68 / 68
 */