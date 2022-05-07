<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/7 23:53
 * Des: 442. 数组中重复的数据
 *      https://leetcode.cn/problems/find-all-duplicates-in-an-array/
 *      给你一个长度为 n 的整数数组 nums ，其中 nums 的所有整数都在范围 [1, n] 内，且每个整数出现 一次 或 两次 。请你找出所有出现 两次 的整数，并以数组形式返回。
 *      你必须设计并实现一个时间复杂度为 O(n) 且仅使用常量额外空间的算法解决此问题。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDuplicates($nums)
    {
        $res = [];
        foreach ($nums as $num) {
            $nums[abs($num) - 1] *= -1;
            if ($nums[abs($num) - 1] > 0) {
                $res[] = abs($num);
            }
        }
//        print_r($nums);
        return $res;
    }
}

var_dump((new Solution)->findDuplicates([4, 3, 2, 7, 8, 2, 3, 1]));

/**
 * 执行用时：116 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：27.1 MB, 在所有 PHP 提交中击败了66.67%的用户
 * 通过测试用例：28 / 28
 */