<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/10 17:39
 * Des: 剑指 Offer 50. 第一个只出现一次的字符
 *      https://leetcode.cn/problems/di-yi-ge-zhi-chu-xian-yi-ci-de-zi-fu-lcof/
 *      在字符串 s 中找出第一个只出现一次的字符。如果没有，返回一个单空格。 s 只包含小写字母。
 */

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function firstUniqChar($s)
    {
        $list = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $list[$s[$i]] = isset($list[$s[$i]]) ? $list[$s[$i]] + 1 : 1;
        }

        foreach ($list as $i => $count) {
            if ($count == 1) {
                return $i;
            }
        }
        return ' ';
    }
}

/**
 * 执行用时：36 ms, 在所有 PHP 提交中击败了26.47%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了35.29%的用户
 * 通过测试用例：105 / 105
 */