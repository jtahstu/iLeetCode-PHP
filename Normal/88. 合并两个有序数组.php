<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/7 20:03
 * Des: 88. 合并两个有序数组
 *      https://leetcode.cn/problems/merge-sorted-array/
 *      给你两个按 非递减顺序 排列的整数数组 nums1 和 nums2，另有两个整数 m 和 n ，分别表示 nums1 和 nums2 中的元素数目。
 *      请你 合并 nums2 到 nums1 中，使合并后的数组同样按 非递减顺序 排列。
 */

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $r = $m + $n - 1;
        $m--;
        $n--;
        //第二个数组排完了就算结束了, 不用管$m, 第一个数组可能为0个元素
        while ($n >= 0) {
            if ($nums1[$m] <= $nums2[$n]) {
                $nums1[$r] = $nums2[$n];
                $n--;
            } else {
                $nums1[$r] = $nums1[$m];
                $m--;
            }
            $r--;
        }
    }
}

/**
 * 从nums1的最后面开始排, 然后就是简单的双指针了
 * 执行用时：12 ms, 在所有 PHP 提交中击败了21.65%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了32.99%的用户
 * 通过测试用例：59 / 59
 */