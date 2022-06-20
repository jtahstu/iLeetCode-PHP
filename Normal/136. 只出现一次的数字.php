<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/20 14:01
 * Desc: 136. 只出现一次的数字
 *       https://leetcode.cn/problems/single-number/
 *      给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums)
    {
        $res = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            $res = $res ^ $nums[$i];
        }
        return $res;
    }
}

/**
 * 执行用时：36 ms, 在所有 PHP 提交中击败了61.16%的用户
 * 内存消耗：21.5 MB, 在所有 PHP 提交中击败了8.68%的用户
 * 通过测试用例：61 / 61
 */