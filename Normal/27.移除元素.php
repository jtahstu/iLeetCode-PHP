<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/23 23:20
 * Des: 27. 移除元素
 *      https://leetcode-cn.com/problems/remove-element/
 *      给你一个数组 nums 和一个值 val，你需要 原地 移除所有数值等于 val 的元素，并返回移除后数组的新长度。
 * 不要使用额外的数组空间，你必须仅使用 O(1) 额外空间并 原地 修改输入数组。
 * 元素的顺序可以改变。你不需要考虑数组中超出新长度后面的元素。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        $count = 0;
        foreach ($nums as $k => $num) {
            if ($num == $val) {
                unset($nums[$k]);
                continue;
            }
            $count++;
        }
        return $count;
    }
}

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了20.22%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了5.24%的用户
 * 通过测试用例：113 / 113
 *
 * if (count($nums) == 0) { return 0; } 加个长度0判断就快这么多了, 说明大部分人都没想到啊
 * 执行用时：8 ms, 在所有 PHP 提交中击败了68.54%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了29.59%的用户
 * 通过测试用例：113 / 113
 */