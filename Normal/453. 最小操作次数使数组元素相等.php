<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/19 1:55
 * Des: 453. 最小操作次数使数组元素相等
 *      https://leetcode.cn/problems/minimum-moves-to-equal-array-elements/
 *      给你一个长度为 n 的整数数组，每次操作将会使 n - 1 个元素增加 1 。返回让数组所有元素相等的最小操作次数。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves($nums)
    {
        //常规
        $count = 0;
        $n = count($nums);
        sort($nums);
        for ($i = 1; $i < $n; $i++) {
            $count += $nums[$i] - $nums[0];
        }
        return $count;

        //简化
//        sort($nums);
//        return array_sum($nums) - count($nums) * $nums[0];

        //再简化
//        $min = min($nums);
//        return array_sum($nums) - count($nums) * $min;
    }
}

print_r((new Solution)->minMoves([1, 7, 8]));

/**
 * 执行用时：88 ms, 在所有 PHP 提交中击败了12.50%的用户
 * 内存消耗：20.2 MB, 在所有 PHP 提交中击败了25.00%的用户
 * 通过测试用例：84 / 84
 *
 * 执行用时：92 ms, 在所有 PHP 提交中击败了12.50%的用户
 * 内存消耗：19.9 MB, 在所有 PHP 提交中击败了75.00%的用户
 * 通过测试用例：84 / 84
 *
 * 执行用时：68 ms, 在所有 PHP 提交中击败了75.00%的用户
 * 内存消耗：20.1 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：84 / 84
 */
