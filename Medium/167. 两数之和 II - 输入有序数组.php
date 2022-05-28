<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 16:49
 * Des: 167. 两数之和 II - 输入有序数组
 *      https://leetcode.cn/problems/two-sum-ii-input-array-is-sorted/
 *      给你一个下标从 1 开始的整数数组 numbers ，该数组已按 非递减顺序排列  ，请你从数组中找出满足相加之和等于目标数 target 的两个数。如果设这两个数分别是 numbers[index1] 和 numbers[index2] ，则 1 <= index1 < index2 <= numbers.length 。
 *      以长度为 2 的整数数组 [index1, index2] 的形式返回这两个整数的下标 index1 和 index2。
 *      你可以假设每个输入 只对应唯一的答案 ，而且你 不可以 重复使用相同的元素。
 *      你所设计的解决方案必须只使用常量级的额外空间。
 */

class Solution
{

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target)
    {
        $n = count($numbers);
        for ($i = 0; $i < $n - 1; $i++) {
            $k = $this->binarySearch($numbers, $i + 1, $target - $numbers[$i]);
            print_r([$i, $target - $numbers[$i], $k]);
            if ($k > $i) return [$i + 1, $k + 1];
        }
        return [-1, -1];
    }

    function binarySearch(&$nums, $l, $target)
    {
        $r = count($nums) - 1;
        while ($l <= $r) {
            $mid = $l + (($r - $l) >> 1);
            if ($nums[$mid] == $target) {
                return $mid;
            } elseif ($nums[$mid] < $target) {
                $l = $mid + 1;
            } else {
                $r = $mid - 1;
            }
        }
        return -1;
    }
}

var_dump((new Solution)->twoSum([-1, -1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], -2));

/**
 * 执行用时：36 ms, 在所有 PHP 提交中击败了66.03%的用户
 * 内存消耗：22 MB, 在所有 PHP 提交中击败了87.82%的用户
 * 通过测试用例：21 / 21
 */