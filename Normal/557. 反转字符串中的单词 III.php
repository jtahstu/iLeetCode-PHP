<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 22:00
 * Des: 557. 反转字符串中的单词 III
 *      https://leetcode.cn/problems/reverse-words-in-a-string-iii/
 *      给定一个字符串 s ，你需要反转字符串中每个单词的字符顺序，同时仍保留空格和单词的初始顺序。
 */

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $res = '';
        foreach (explode(" ", $s) as $w) {
            $res .= strrev($w) . " ";
        }
        return rtrim($res);
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了94.87%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了44.87%的用户
 * 通过测试用例：29 / 29
 */