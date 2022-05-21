<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/22 5:48
 * Des: 剑指 Offer 40. 最小的k个数
 *      https://leetcode.cn/problems/zui-xiao-de-kge-shu-lcof/
 *      输入整数数组 arr ，找出其中最小的 k 个数。
 */

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbers($arr, $k) {
        sort($arr);
        return array_slice($arr, 0, $k);
    }
}

/**
 * 执行用时：56 ms, 在所有 PHP 提交中击败了86.84%的用户
 * 内存消耗：21 MB, 在所有 PHP 提交中击败了68.42%的用户
 * 通过测试用例：38 / 38
 */