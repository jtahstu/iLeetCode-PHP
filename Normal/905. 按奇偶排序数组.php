<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/28 00:58
 * Des: 905. 按奇偶排序数组
 *      https://leetcode-cn.com/problems/sort-array-by-parity/
 *      给你一个整数数组 nums，将 nums 中的的所有偶数元素移动到数组的前面，后跟所有奇数元素。
 *      返回满足此条件的 任一数组 作为答案。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArrayByParity($nums)
    {
        $i = 0;
        $j = count($nums) - 1;
        while ($i < $j) {
            if ($nums[$i] % 2 === 0) {
                $i++;
                continue;
            }
            if ($nums[$j] % 2 === 1) {
                $j--;
                continue;
            }
            $t = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $t;
        }
        return $nums;
    }

    function sortArrayByParity2($nums)
    {
        $j = $o = [];
        foreach ($nums as $num) {
            if ($num % 2 == 0) {
                $o[] = $num;
            } else {
                $j[] = $num;
            }
        }
        return array_merge($o, $j);
    }
}

print_r((new Solution())->sortArrayByParity([4, 3, 2, 6]));

/**
 * 2边推进的方式速度快, 原地交换内存占用也少
 * 执行用时：20 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.8 MB, 在所有 PHP 提交中击败了71.43%的用户
 * 通过测试用例：285 / 285
 */