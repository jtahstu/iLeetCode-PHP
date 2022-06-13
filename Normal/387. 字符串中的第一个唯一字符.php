<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/13 22:27
 * Des: 387. 字符串中的第一个唯一字符
 *      https://leetcode.cn/problems/first-unique-character-in-a-string/
 *      给定一个字符串 s ，找到 它的第一个不重复的字符，并返回它的索引 。如果不存在，则返回 -1 。
 */

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s)
    {
        $hash = [];
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $hash[$s[$i]] = isset($hash[$s[$i]]) ? $hash[$s[$i]] + 1 : 1;
        }
        for ($i = 0; $i < $len; $i++) {
            if ($hash[$s[$i]] == 1) return $i;
        }
        return -1;
    }
}

/**
 * 执行用时：44 ms, 在所有 PHP 提交中击败了36.59%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了87.81%的用户
 * 通过测试用例：105 / 105
 */