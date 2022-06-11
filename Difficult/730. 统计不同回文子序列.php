<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/10 22:25
 * Des: 730. 统计不同回文子序列
 *      https://leetcode.cn/problems/count-different-palindromic-subsequences/
 *      给定一个字符串 s，返回 s 中不同的非空「回文子序列」个数 。
 *      通过从 s 中删除 0 个或多个字符来获得子序列。
 *      如果一个字符序列与它反转后的字符序列一致，那么它是「回文字符序列」。
 *      如果有某个 i , 满足 ai != bi ，则两个序列 a1, a2, ... 和 b1, b2, ... 不同。
 */

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function countPalindromicSubsequences($s)
    {
        $MOD = 1e9 + 7;
        $n = strlen($s);
        $dp = array_fill(0, 4, array_fill(0, $n, array_fill(0, $n, 0)));
        for ($i = 0; $i < $n; $i++) {
            $dp[ord($s[$i]) - ord('a')][$i][$i] = 1;
        }
        for ($len = 2; $len <= $n; $len++) {
            for ($i = 0, $j = $len - 1; $j < $n; $i++, $j++) {
                for ($c = ord('a'), $k = 0; $c <= ord('d'); $c++, $k++) {
                    if (ord($s[$i]) == $c && ord($s[$j]) == $c) {
                        $dp[$k][$i][$j] = (2 + $dp[0][$i + 1][$j - 1] + $dp[1][$i + 1][$j - 1] +
                                $dp[2][$i + 1][$j - 1] + $dp[3][$i + 1][$j - 1]) % $MOD;
                    } elseif (ord($s[$i]) == $c) {
                        $dp[$k][$i][$j] = $dp[$k][$i][$j - 1];
                    } elseif (ord($s[$j]) == $c) {
                        $dp[$k][$i][$j] = $dp[$k][$i + 1][$j];
                    } else {
                        $dp[$k][$i][$j] = $dp[$k][$i + 1][$j - 1];
                    }
                }
            }
        }
        $res = 0;
        for ($i = 0; $i < 4; $i++) {
            $res = ($res + $dp[$i][0][$n - 1]) % $MOD;
        }
        return $res;
    }
}

/**
 * https://leetcode.cn/problems/count-different-palindromic-subsequences/solution/php-by-fcuk-fawn/
 * 执行用时：1420 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：145.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：367 / 367
 */