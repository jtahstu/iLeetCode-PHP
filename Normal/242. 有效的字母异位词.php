<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/13 22:44
 * Des: 242. 有效的字母异位词
 *      https://leetcode.cn/problems/valid-anagram/
 *      给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
 *      注意：若 s 和 t 中每个字符出现的次数都相同，则称 s 和 t 互为字母异位词。
 */

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t)
    {
        $s_len = strlen($s);
        $t_len = strlen($t);
        if ($s_len != $t_len) return false;
        $hash_s = $hash_t = [];
        for ($i = 0; $i < $s_len; $i++) {
            $hash_s[$s[$i]] = isset($hash_s[$s[$i]]) ? $hash_s[$s[$i]] + 1 : 1;
            $hash_t[$t[$i]] = isset($hash_t[$t[$i]]) ? $hash_t[$t[$i]] + 1 : 1;
        }
        foreach ($hash_s as $k => $c) {
            if (!isset($hash_t[$k]) || $hash_t[$k] != $c) return false;
        }
        return true;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了81.37%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了87.25%的用户
 * 通过测试用例：36 / 36
 */