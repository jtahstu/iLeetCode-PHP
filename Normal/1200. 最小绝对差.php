<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/4 10:07
 * Desc: 1200. 最小绝对差
 *      https://leetcode.cn/problems/minimum-absolute-difference/
 *      给你个整数数组 arr，其中每个元素都 不相同。
 *      请你找到所有具有最小绝对差的元素对，并且按升序的顺序返回。
 */

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Integer[][]
     */
    function minimumAbsDifference($arr)
    {
        sort($arr);
        $n = count($arr);
        $min_diff = $arr[1] - $arr[0];
        for ($i = 2; $i < $n; $i++) {
            $min_diff = ($arr[$i] - $arr[$i - 1]) < $min_diff ? $arr[$i] - $arr[$i - 1] : $min_diff;
        }
        $res = [];
        for ($i = 1; $i < $n; $i++) {
            if ($arr[$i] - $arr[$i - 1] == $min_diff) {
                $res[] = [$arr[$i - 1], $arr[$i]];
            }
        }
        return $res;
    }
}

/**
 * 执行用时：144 ms, 在所有 PHP 提交中击败了8.33%的用户
 * 内存消耗：33.8 MB, 在所有 PHP 提交中击败了25.00%的用户
 * 通过测试用例：37 / 37
 */