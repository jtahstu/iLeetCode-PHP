<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/24 16:15
 * Des: 868. 二进制间距
 *      https://leetcode-cn.com/problems/binary-gap/
 *      给定一个正整数 n，找到并返回 n 的二进制表示中两个 相邻 1 之间的 最长距离 。如果不存在两个相邻的 1，返回 0 。
 * 如果只有 0 将两个 1 分隔开（可能不存在 0 ），则认为这两个 1 彼此 相邻 。两个 1 之间的距离是它们的二进制表示中位置的绝对差。例如，"1001" 中的两个 1 的距离为 3 。
 */


class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function binaryGap($n)
    {
        $er = decbin($n);  //变2进制
//        var_dump($er);
        $max_count = $start = 0;
        for ($i = 0; $i < strlen($er); $i++) {
            if ($er[$i] != 1) {
                continue;
            }
            $max_count = max($max_count, $i - $start);
            $start = $i;
        }
        return $max_count;
    }
}

var_dump((new Solution())->binaryGap(22));
var_dump((new Solution())->binaryGap(8));
var_dump((new Solution())->binaryGap(5));

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了66.67%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了33.33%的用户
 * 通过测试用例：261 / 261
 *
 * 简化了下代码就快很多
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了73.33%的用户
 * 通过测试用例：261 / 261
 */