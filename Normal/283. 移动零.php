<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 16:05
 * Des: 283. 移动零
 *      https://leetcode.cn/problems/move-zeroes/
 *      给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
 *      请注意 ，必须在不复制数组的情况下原地对数组进行操作。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $l0 = $l1 = 0;
        $n = count($nums);
        while ($l0 < $n && $l1 < $n) {
            while ($l0 < $n && $nums[$l0] != 0) $l0++;
            while ($l1 < $n && $nums[$l1] == 0) $l1++;
//            var_dump([$l0, $l1]);
            if ($l0 >= $n || $l1 >= $n) break;
            if ($l0 < $l1) {
                [$nums[$l0], $nums[$l1]] = [$nums[$l1], $nums[$l0]];
                $l0++;
            }
            $l1++;
        }
        print_r($nums);
    }
}

$nums = [1, 0];
print_r((new Solution)->moveZeroes($nums));
$nums1 = [0, 1];
print_r((new Solution)->moveZeroes($nums1));
$nums2 = [1, 0, 2];
print_r((new Solution)->moveZeroes($nums2));
$nums4 = [1, 2, 0];
print_r((new Solution)->moveZeroes($nums4));
$nums5 = [1, 2, 0, 1, 0];
print_r((new Solution)->moveZeroes($nums5));

/**
 * 双指针
 * 执行用时：44 ms, 在所有 PHP 提交中击败了73.65%的用户
 * 内存消耗：21 MB, 在所有 PHP 提交中击败了19.14%的用户
 * 通过测试用例：74 / 74
 */