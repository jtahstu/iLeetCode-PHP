<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 10:23
 * Des: 6080. 使数组按非递减顺序排列
 *      https://leetcode.cn/problems/steps-to-make-array-non-decreasing/
 *      给你一个下标从 0 开始的整数数组 nums 。在一步操作中，移除所有满足 nums[i - 1] > nums[i] 的 nums[i] ，其中 0 < i < nums.length 。
 *      重复执行步骤，直到 nums 变为 非递减 数组，返回所需执行的操作数。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function totalSteps($nums)
    {
        $n = count($nums);
        $max = 0;
        $l = 0;
        for ($i = 1; $i < $n; $i++) {
            if($i!=1&&$nums[$i]<$nums[$i-1]) {
                $l = $i-1;
            }
            if($nums[$i]<$nums[$l]) {
                $max = max($max, $i - $l);
            }

        }
        return $max;
    }
}

var_dump((new Solution())->totalSteps([10, 1, 2, 3, 4, 5, 6, 1, 2, 3])); //6
var_dump((new Solution())->totalSteps([10, 1])); //1
var_dump((new Solution())->totalSteps([10, 1, 2])); //2
var_dump((new Solution())->totalSteps([5, 11, 7, 8, 11])); //2
var_dump((new Solution())->totalSteps([7,14,4,14,13,2,6,13])); //3

//这个暴力肯定超时, 就是找规律
//咱这找递增序列, 最大的递增序列长度就是要操作的次数, 能过一些案例, 但是还是有案例过不了, 潮了
//摆烂摆烂