<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 16:29
 * Des: 977. 有序数组的平方
 *      给定一个按非递减顺序排序的整数数组 A，返回每个数字的平方组成的新数组，要求也按非递减顺序排序。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortedSquares($nums)
    {
        $res = [];
        $i = 0;
        $j = count($nums) - 1;
        while ($i <= $j) {
            if (abs($nums[$i]) > abs($nums[$j])) {
                $res[] = $nums[$i] * $nums[$i];
                $i++;
            } else {
                $res[] = $nums[$j] * $nums[$j];
                $j--;
            }
        }
        return array_reverse($res);
    }
}

/**
 * 执行用时：64 ms, 在所有 PHP 提交中击败了52.52%的用户
 * 内存消耗：21 MB, 在所有 PHP 提交中击败了96.40%的用户
 * 通过测试用例：137 / 137
 */