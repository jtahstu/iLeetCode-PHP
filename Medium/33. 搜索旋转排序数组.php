<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/4 22:54
 * Des: 33. 搜索旋转排序数组
 *      https://leetcode.cn/problems/search-in-rotated-sorted-array/
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
        if (count($nums) == 1 && $nums[0] !== $target) {
            return -1;
        }
        $count = count($nums);
        $x = 0;
        for ($i = 1; $i < $count; $i++) {
            if ($nums[$i] < $nums[$i - 1]) {
                $x = $i;
                break;
            }
        }
        $nums = array_merge($nums, array_slice($nums, 0, $x));
//        echo implode(', ', $nums) . PHP_EOL;
        $a = $this->binary_search($nums, $target, $x);
        return $a % $count;

//        这样貌似更好一些
//        int ans = binary_search(nums, 0, idx, target);
//        if (ans != -1) return ans;
//        if (idx + 1 < n) ans = find(nums, idx + 1, n - 1, target);
//        return ans;
    }

    function binary_search(&$nums, $target, $l)
    {
        $r = count($nums) - 1;
        while ($l <= $r) {
            $mid = intval(($l + $r) / 2);
            $v = $nums[$mid];
            if ($target == $v) {
                return $mid;
            }
            if ($v > $target) {
                $r = $mid - 1;
            }
            if ($v < $target) {
                $l = $mid + 1;
            }
        }
        return -1;
    }

//    Java O(logn)解法
//    public int search(int[] nums, int target) {
//        int n = nums.length;
//        if (n == 0) {
//            return -1;
//        }
//
//        if (n == 1) {
//            return nums[0] == target ? 0 : -1;
//        }
//        int l = 0, r = n - 1;
//        while (l <= r) {
//            int mid = (l + r) / 2;
//            if (nums[mid] == target) {
//                return mid;
//            }
//            if (nums[0] <= nums[mid]) {
//                if (nums[0] <= target && target < nums[mid]) {
//                    r = mid - 1;
//                } else {
//                    l = mid + 1;
//                }
//            } else {
//                if (nums[mid] < target && target <= nums[n - 1]) {
//                    l = mid + 1;
//                } else {
//                    r = mid - 1;
//                }
//            }
//        }
//        return -1;
//    }
}

var_dump((new Solution)->search([4, 5, 6, 7, 0, 1, 2], 0));
var_dump((new Solution)->search([4, 5, 6, 7, 0, 1, 2], 5));
var_dump((new Solution)->search([3, 5, 1], 3));
var_dump((new Solution)->search([1], 0));

/**
 * 题解的写法是2边都二分, 我一开始想的就是把左边的移到右边去形成一整个有序的数组, 再二分
 * 这个解法因为要找到反转点, 那么最坏的情况就是最后一个, 时间复杂度就是O(n)
 * O(logn)解法那就是直接和nums[0]比较, 来确定在左边还是在右边
 * 执行用时：8 ms, 在所有 PHP 提交中击败了84.54%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了86.60%的用户
 * 通过测试用例：195 / 195
 */