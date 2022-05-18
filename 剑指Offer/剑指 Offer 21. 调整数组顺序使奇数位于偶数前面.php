<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/18 10:45
 * Des: 剑指 Offer 21. 调整数组顺序使奇数位于偶数前面
 *      https://leetcode.cn/problems/diao-zheng-shu-zu-shun-xu-shi-qi-shu-wei-yu-ou-shu-qian-mian-lcof/
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function exchange($nums)
    {
        $l = 0;
        $r = count($nums) - 1;
        while ($l < $r) {
            while ($l < $r && $nums[$l] % 2 == 1) $l++;
            while ($l < $r && $nums[$r] % 2 == 0) $r--;
            [$nums[$l], $nums[$r]] = [$nums[$r], $nums[$l]];
            $l++;
            $r--;
        }
        return $nums;
    }
}

var_dump((new Solution)->exchange([1, 3, 5]));

/**
 * 执行用时：72 ms, 在所有 PHP 提交中击败了7.32%的用户
 * 内存消耗：26.8 MB, 在所有 PHP 提交中击败了60.98%的用户
 * 通过测试用例：17 / 17
 */