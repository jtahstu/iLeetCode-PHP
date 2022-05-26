<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 16:14
 * Des: 704. 二分查找
 *      https://leetcode.cn/problems/binary-search/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $len = count($nums);
        if ($len == 0) return -1;
        $left = 0;
        $right = $len - 1;
        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);
            if ($nums[$mid] == $target) return $mid;
            if ($nums[$mid] > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return -1;
    }
}