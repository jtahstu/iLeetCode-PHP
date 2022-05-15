<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 23:49
 * Des: 3. 无重复字符的最长子串
 *      https://leetcode.cn/problems/longest-substring-without-repeating-characters/
 *      给定一个字符串 s ，请你找出其中不含有重复字符的 最长子串 的长度。
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

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了78.51%的用户
 * 内存消耗：18.4 MB, 在所有 PHP 提交中击败了95.47%的用户
 * 通过测试用例：987 / 987
 */

