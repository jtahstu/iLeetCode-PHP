<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/10 17:10
 * Des: 剑指 Offer 11. 旋转数组的最小数字
 *      https://leetcode.cn/problems/xuan-zhuan-shu-zu-de-zui-xiao-shu-zi-lcof/
 */

class Solution
{

    /**
     * @param Integer[] $numbers
     * @return Integer
     */
    function minArray($numbers)
    {
        if (count($numbers) == 1) return $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            if ($numbers[$i] < $numbers[$i - 1]) {
                return $numbers[$i];
            }
        }
        return $numbers[0];
    }
}

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了30.00%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了80.00%的用户
 * 通过测试用例：192 / 192
 */