<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/8 23:04
 * Des: 剑指 Offer 58 - II. 左旋转字符串
 *      https://leetcode.cn/problems/zuo-xuan-zhuan-zi-fu-chuan-lcof/
 *      字符串的左旋转操作是把字符串前面的若干个字符转移到字符串的尾部。请定义一个函数实现字符串左旋转操作的功能。比如，输入字符串"abcdefg"和数字2，该函数将返回左旋转两位得到的结果"cdefgab"。
 */

class Solution {

    /**
     * @param String $s
     * @param Integer $n
     * @return String
     */
    function reverseLeftWords($s, $n) {
        return substr($s, $n, strlen($s)-$n) . substr($s,0,$n);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了87.30%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了26.98%的用户
 * 通过测试用例：34 / 34
 */