<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/8 15:29
 * Des: 1332. 删除回文子序列
 *      https://leetcode.cn/problems/remove-palindromic-subsequences/
 *      给你一个字符串 s，它仅由字母 'a' 和 'b' 组成。每一次删除操作都可以从 s 中删除一个回文 子序列。
 *      返回删除给定字符串中所有字符（字符串为空）的最小删除次数。
 *      「子序列」定义：如果一个字符串可以通过删除原字符串某些字符而不改变原字符顺序得到，那么这个字符串就是原字符串的一个子序列。
 *      「回文」定义：如果一个字符串向后和向前读是一致的，那么这个字符串就是一个回文。
 */

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function removePalindromeSub($s)
    {
        $is_palindrome = true;
        $l = 0;
        $r = strlen($s) - 1;
        while ($l < $r) {
            if ($s[$l] == $s[$r]) {
                $l++;
                $r--;
                continue;
            }
            $is_palindrome = false;
            break;
        }
        return $is_palindrome ? 1 : 2;
    }
}

/**
 * 搁着脑筋急转弯呢, 子序列最多就2次(先删a再删b), 是回文就是1次不是就2次
 * 一开始想的, 这要是删了中间一段, 然后又凑出来个一段, 那还挺麻烦的呢
 * 执行用时：8 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：18.4 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：48 / 48
 */