<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/10 17:51
 * Des: 350. 两个数组的交集 II
 *      https://leetcode.cn/problems/intersection-of-two-arrays-ii/
 *      给你两个整数数组 nums1 和 nums2 ，请你以数组形式返回两数组的交集。返回结果中每个元素出现的次数，应与元素在两个数组中都出现的次数一致（如果出现次数不一致，则考虑取较小值）。可以不考虑输出结果的顺序。
 */

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2)
    {
        //这样竟然不对, 神奇, [1,2,2,1] [2]用函数返回[2,2]
        //return array_intersect($nums1, $nums2);

        $n1 = count($nums1);
        $n2 = count($nums2);
        $hash1 = $hash2 = [];
        for ($i = 0; $i < $n1; $i++) {
            $hash1[$nums1[$i]] = isset($hash1[$nums1[$i]]) ? $hash1[$nums1[$i]] + 1 : 1;
        }
        for ($i = 0; $i < $n2; $i++) {
            $hash2[$nums2[$i]] = isset($hash2[$nums2[$i]]) ? $hash2[$nums2[$i]] + 1 : 1;
        }
        $res = [];
        foreach ($hash1 as $v => $c) {
            if (isset($hash2[$v])) {
                $res = array_merge($res, array_fill(0, min($c, $hash2[$v]), $v));
            }
        }
        return $res;
    }
}

/**
 * 简单写法就是双层循环, nums2边统计边删
 * 执行用时：12 ms, 在所有 PHP 提交中击败了66.67%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了74.19%的用户
 * 通过测试用例：56 / 56
 */