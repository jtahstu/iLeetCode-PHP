<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 23:30
 * Des: 剑指 Offer 48. 最长不含重复字符的子字符串
 *      https://leetcode.cn/problems/zui-chang-bu-han-zhong-fu-zi-fu-de-zi-zi-fu-chuan-lcof/
 *      请从字符串中找出一个最长的不包含重复字符的子字符串，计算该最长子字符串的长度。
 */

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        if (!$s) return 0;
        $max = 1;
        $l = 0;
        for ($i = 1; $i < strlen($s); $i++) {
            $x = strpos(substr($s, $l, $i - $l), $s[$i]);
            if ($x !== false) {
                $l += $x + 1;
            } else {
                $max = max($max, $i - $l + 1);
            }
        }
        return $max;
    }
}

var_dump((new Solution)->lengthOfLongestSubstring("abcabcbb"));
var_dump((new Solution)->lengthOfLongestSubstring("bbbbbbb"));
var_dump((new Solution)->lengthOfLongestSubstring("pwwkew"));

/**
 * 这个方式是动态规划+线性遍历
 * 执行用时：12 ms, 在所有 PHP 提交中击败了89.19%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了83.78%的用户
 * 通过测试用例：987 / 987
 */