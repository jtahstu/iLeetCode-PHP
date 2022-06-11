<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 10:16
 * Des: 1658. 将 x 减到 0 的最小操作数
 *      https://leetcode.cn/problems/minimum-operations-to-reduce-x-to-zero/
 *      给你一个整数数组 nums 和一个整数 x 。每一次操作时，你应当移除数组 nums 最左边或最右边的元素，然后从 x 中减去该元素的值。请注意，需要 修改 数组以供接下来的操作使用。
 *      如果可以将 x 恰好 减到 0 ，返回 最小操作数 ；否则，返回 -1 。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer   $x
     * @return Integer
     */
    function minOperations($nums, $x)
    {
        $count = count($nums);
        $sum_l[-1] = 0;
        $sum_l[$count] = 0;
        $sum_r[$count] = 0;
        for ($i = 0; $i < $count; $i++)
            $sum_l[$i] = $sum_l[$i - 1] + $nums[$i];
        for ($i = $count - 1; $i >= 0; $i--)
            $sum_r[$i] = $sum_r[$i + 1] + $nums[$i];
        $sum_r = array_values($sum_r);
//        print_r($sum_r);
        $min = PHP_INT_MAX;
        for ($i = 0; $i <= $count; $i++) {
            $target = $x - $sum_l[$i];
            if ($target < 0)
                continue;
            $r = $i < $count ? $count - $i - 1 : $count - 1;
            $index = $this->binarySearch($sum_r, 0, $r, $target);
            if ($index === -1)
                continue;
//            echo "\t$i, $index\n";
            $min = min($min, $i < $count ? $i + 1 + $index : $index);
        }
        return $min == PHP_INT_MAX ? -1 : $min;
    }

    function binarySearch(&$nums, $l, $r, $target)
    {
//        echo implode(',', $nums) . ", $l, $r, $target\n";
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

//nums = [3,2,20,1,1,3], x = 10
var_dump((new Solution)->minOperations([3, 2, 20, 1, 1, 3], 10));
var_dump((new Solution)->minOperations([1, 1, 4, 2, 3], 5));
var_dump((new Solution)->minOperations([3, 2, 3, 1, 5], 5));

/**
 * 左右前缀和+二分, 从头遍历, 从右边区间二分查找$x-$sum_l[$i], 主要就是注意左边和右边的下标, +1 -1的要看清
 *
 * 执行用时：616 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：35.3 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：93 / 93
 */