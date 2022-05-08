<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/8 23:01
 * Des: 剑指 Offer 05. 替换空格
 *      https://leetcode.cn/problems/ti-huan-kong-ge-lcof/
 *      请实现一个函数，把字符串 s 中的每个空格替换成"%20"。
 */

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function replaceSpace($s) {
        return str_replace(' ', '%20', $s);
    }
}

var_dump((new Solution)->replaceSpace("Welcome to leetcode.cn"));

//执行用时：4 ms, 在所有 PHP 提交中击败了84.54%的用户
//内存消耗：18.4 MB, 在所有 PHP 提交中击败了91.75%的用户
//通过测试用例：27 / 27