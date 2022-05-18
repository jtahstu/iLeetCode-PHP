<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/19 3:03
 * Des: 剑指 Offer 57. 和为s的两个数字
 *      https://leetcode.cn/problems/he-wei-sde-liang-ge-shu-zi-lcof/
 *      输入一个递增排序的数组和一个数字s，在数组中查找两个数，使得它们的和正好是s。如果有多对数字的和等于s，则输出任意一对即可。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            if ($target - $nums[$i] > $nums[$i]) {
                $l = $i + 1;
                $r = $n - 1;
                $t = $target - $nums[$i];
            } else {
                $l = 0;
                $r = $i - 1;
                $t = $target - $nums[$i];
            }

            $res = $this->binarySearch($nums, $l, $r, $t);
            if ($res) {
                return [$nums[$i], $t];
            }
        }
        return [];
    }

    function binarySearch(&$nums, $l, $r, $target)
    {
        while ($l <= $r) {
            $mid = $l + (($r - $l) >> 1);
            $v = $nums[$mid];
            if ($target == $v) {
                return true;
            }
            if ($v > $target) {
                $r = $mid - 1;
            }
            if ($v < $target) {
                $l = $mid + 1;
            }
        }
        return false;
    }
}

/**
 * 执行用时：408 ms, 在所有 PHP 提交中击败了9.68%的用户
 * 内存消耗：30.9 MB, 在所有 PHP 提交中击败了77.42%的用户
 * 通过测试用例：36 / 36
 */

// 双指针解法也不错
//class Solution {
//    public int[] twoSum(int[] nums, int target) {
//        int i = 0, j = nums.length - 1;
//        while(i < j) {
//            int s = nums[i] + nums[j];
//            if(s < target) i++;
//            else if(s > target) j--;
//            else return new int[] { nums[i], nums[j] };
//        }
//        return new int[0];
//    }
//}