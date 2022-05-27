<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/27 7:44
 * Des: 剑指 Offer 56 - I. 数组中数字出现的次数
 *      https://leetcode.cn/problems/shu-zu-zhong-shu-zi-chu-xian-de-ci-shu-lcof/
 *      一个整型数组 nums 里除两个数字之外，其他数字都出现了两次。请写程序找出这两个只出现一次的数字。要求时间复杂度是O(n)，空间复杂度是O(1)。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function singleNumbers($nums)
    {
        $s = 0;
        foreach ($nums as $num) {
            $s ^= $num;
        }
        $i = 1;
        while (($s & 1) == 0) {
            $s >>= 1;
            $i <<= 1;
        }
        $a = $b = 0;
        foreach ($nums as $num) {
            if ($num & $i) {
                $a ^= $num;
            } else {
                $b ^= $num;
            }
        }
        return [$a, $b];


        //不满足空间要求
//        $res = array_count_values($nums);
//        foreach ($res as $key => $value) {
//            if ($value == 1) {
//                $ans[] = $key;
//            }
//        }
//        return $ans;
    }
}

print_r((new Solution())->singleNumbers([4, 1, 2, 1]));
print_r((new Solution())->singleNumbers([1, 2, 5, 2]));

/**
 * 执行用时：48 ms, 在所有 PHP 提交中击败了12.50%的用户
 * 内存消耗：19.8 MB, 在所有 PHP 提交中击败了62.50%的用户
 * 通过测试用例：35 / 35
 */