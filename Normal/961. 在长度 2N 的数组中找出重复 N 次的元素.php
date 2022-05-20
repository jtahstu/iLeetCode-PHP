<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/21 6:00
 * Des: 961. 在长度 2N 的数组中找出重复 N 次的元素
 *      https://leetcode.cn/problems/n-repeated-element-in-size-2n-array/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function repeatedNTimes($nums)
    {
        $hash = [];
        $n = count($nums);
        foreach ($nums as $num) {
            $hash[$num] = isset($hash[$num]) ? $hash[$num] + 1 : 1;
            if ($hash[$num] == ($n >> 1)) {
                return $num;
            }
        }
        return -1;
    }
}

/**
 * 方法多多, 咱就是哈希表
 * 执行用时：60 ms, 在所有 PHP 提交中击败了27.27%的用户
 * 内存消耗：19.9 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：102 / 102
 */