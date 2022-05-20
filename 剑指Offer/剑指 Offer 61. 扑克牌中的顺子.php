<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/21 6:58
 * Des: 剑指 Offer 61. 扑克牌中的顺子
 *      https://leetcode.cn/problems/bu-ke-pai-zhong-de-shun-zi-lcof/
 *      从若干副扑克牌中随机抽 5 张牌，判断是不是一个顺子，即这5张牌是不是连续的。2～10为数字本身，A为1，J为11，Q为12，K为13，而大、小王为 0 ，可以看成任意数字。A 不能视为 14。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isStraight($nums)
    {
        $wang_count = 0;
        $hash = ['A' => 1, 'J' => 11, 'Q' => 12, 'K' => 13];
        foreach ($nums as $k => $num) {
            if ($num == 0) {
                $wang_count++;
                unset($nums[$k]);
            }
            if (!is_numeric($num) && isset($hash[$num])) {
                $nums[$k] = $hash[$num];
            }
        }
        if (!$nums) return true;
        $nums = array_values($nums);
        $min_num = min($nums);
        $res_arr = range($min_num, $min_num + 4);
        $res_arr = array_diff($res_arr, $nums);
        if (count($res_arr) == $wang_count) return true;
        return false;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了78.79%的用户
 * 内存消耗：18.4 MB, 在所有 PHP 提交中击败了93.94%的用户
 * 通过测试用例：203 / 203
 */