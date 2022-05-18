<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/19 3:20
 * Des: 剑指 Offer 58 - I. 翻转单词顺序
 *      https://leetcode.cn/problems/fan-zhuan-dan-ci-shun-xu-lcof/
 *      151. 颠倒字符串中的单词
 *      https://leetcode.cn/problems/reverse-words-in-a-string/
 */

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $s = preg_replace('/\s(?=\s)/', "\\1", trim($s));
        return implode(' ', array_reverse(explode(' ', $s)));
    }
}

var_dump((new Solution)->reverseWords("F R  I   E    N     D      S      "));

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了90.70%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了69.77%的用户
 * 通过测试用例：58 / 58
 */