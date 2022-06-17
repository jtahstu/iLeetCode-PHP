<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/12 23:03
 * Des: 724. 寻找数组的中心下标
 *      https://leetcode.cn/problems/find-pivot-index/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     * 寻找数组的中心索引
     * 数组 中心下标 是数组的一个下标，其左侧所有元素相加的和等于右侧所有元素相加的和。
     * https://leetcode-cn.com/leetbook/read/array-and-string/yf47s/
     */
    function pivotIndex($nums)
    {
        $sum = array_sum($nums);
        $left_sum = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if ($left_sum * 2 + $nums[$i] === $sum) {
                return $i;
            }
            $left_sum += $nums[$i];
        }
        return -1;
    }
}

var_dump((new Solution())->pivotIndex([1, 7, 3, 6, 5, 6]));
var_dump((new Solution())->pivotIndex([1, 2, 3]));
var_dump((new Solution())->pivotIndex([2, 1, -1]));
var_dump((new Solution())->pivotIndex([-1, -1, -1, -1, -1, 0]));

/*
执行用时：40 ms, 在所有 PHP 提交中击败了72.97%的用户
内存消耗：19.7 MB, 在所有 PHP 提交中击败了49.55%的用户
通过测试用例：745 / 745
 */