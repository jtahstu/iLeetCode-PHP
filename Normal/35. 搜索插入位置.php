<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 16:24
 * Des: 35. 搜索插入位置
 *      https://leetcode.cn/problems/search-insert-position/
 *      给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $len = count($nums);
        if ($len == 0) return 0;
        $left = 0;
        $right = $len - 1;
        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            } else if ($nums[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return $left;
    }
}

/**
 * 解题思路：二分查找
 * 执行用时：12 ms, 在所有 PHP 提交中击败了65.00%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了94.72%的用户
 * 通过测试用例：64 / 64
 */