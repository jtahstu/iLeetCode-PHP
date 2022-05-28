<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/5 0:22
 * Des: 713. 乘积小于 K 的子数组
 *      https://leetcode.cn/problems/subarray-product-less-than-k/
 *      给你一个整数数组 nums 和一个整数 k ，请你返回子数组内所有元素的乘积严格小于 k 的连续子数组的数目。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numSubarrayProductLessThanK($nums, $k)
    {
        if (in_array($k, [0, 1])) {
            return 0;
        }
        $count = $l = 0;
        $num = 1;
        for ($i = 0; $i < count($nums); $i++) {
            $num *= $nums[$i];
            while ($num >= $k) {
                $num = intval($num / $nums[$l]);
                $l++;
            }
            $count += $i - $l + 1;
        }
        return $count;
    }

    function numSubarrayProductLessThanK暴力超时($nums, $k)
    {
        if (count($nums) == 1) {
            return $nums[0] < $k ? 1 : 0;
        }
        $count = 0;
        $l = count($nums);
        for ($i = 0; $i < $l; $i++) {
            $num = 1;
            for ($j = $i; $j < $l; $j++) {
                if ($num * $nums[$j] < $k) {
                    $count++;
                    $num *= $nums[$j];
                } else {
                    break;
                }
            }
        }
        return $count;
    }
}

var_dump((new Solution)->numSubarrayProductLessThanK([10, 5, 2, 6], 100));
var_dump((new Solution)->numSubarrayProductLessThanK([1, 2, 3], 1));
var_dump((new Solution)->numSubarrayProductLessThanK([1, 1, 1], 1));
var_dump((new Solution)->numSubarrayProductLessThanK([10, 9, 10, 4, 3, 8, 3, 3, 6, 2, 10, 10, 9, 3], 19));

/**
 * 移动右侧收缩左侧, 小于$k, 那就可以加上该区间的子数组的个数
 * 双指针的解法, 每次要找到从左到当前位置乘积小于$k的区间, 子数组个数就是区间数n的1+2+3+...+n个
 * 执行用时：180 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：22.6 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：97 / 97
 */