<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/16 0:23
 * Des: 479. 最大回文数乘积
 *      https://leetcode-cn.com/problems/largest-palindrome-product/
 *      给定一个整数 n ，返回 可表示为两个 n 位整数乘积的 最大回文整数 。因为答案可能非常大，所以返回它对 1337 取余 。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function largestPalindrome($n)
    {
        if ($n == 1) {
            return 9;
        }
        //2个同位数的数字相乘肯定是2n位的数, 那么直接构造2n位的回文数
        $max = pow(10, $n) - 1;
        $min = pow(10, $n - 1);
        for ($i = $max; $i >= $min; $i--) {
            $left = strval($i);
            $right = '';
            for ($j = 0; $j < strlen($left); $j++) {
                $right .= $left[strlen($left) - $j - 1];
            }
            $val = $left . $right;
            for ($k = $max; $k * $k >= $val; $k--) { //k>=√val
                if ($val % $k == 0) {
//                    echo $val / $k . " * $k = $val 是回文\n";
                    return $val % 1337;
                }
            }
        }
    }

    function largestPalindrome打表($n)
    {
        $res = [0, 9, 987, 123, 597, 677, 1218, 877, 475];
        return $res[$n];
    }

    /**
     * @param Integer $n
     * @return Integer
     * 3 * 3 = 9 是 回文
     * 99 * 91 = 9009 是 回文
     * 962 * 924 = 888888 是 回文  //这个答案是错误的，正确是993 * 913 = 906609
     * 9999 * 9901 = 99000099 是 回文
     * 99979 * 99681 = 9966006699 是 回文
     * 999999 * 999001 = 999000000999 是 回文
     * 9998017 * 9997647 = 99956644665999 是 回文
     * 99999999 * 99990001 = 9999000000009999 是 回文
     */
    function largestPalindrome暴力($n)
    {
        $res = [];
        for ($i = 3; $i <= 3; $i++) {
            $max = pow(10, $i) - 1;
            $nums = pow(10, $i) - pow(10, $i - 1);
            for ($j = 0; $j < $nums; $j++) {

                for ($k = 0; $k <= $j; $k++) {
                    $x = $max - $k;
                    $y = $max - $j;
                    $s = strval($x * $y);
                    if ($this->judgeHuiWen($s)) {
                        echo "{$x} * {$y} = {$s} 是 回文\n";
                        $res[$i] = ($x * $y) % 1337;
                        break 2;
                    }
                    if (($x * $y) % 1337 === 123) {
                        echo "{$x} * {$y} = {$s}\n";
                    }
                }
            }
        }
        var_dump($res);
    }

    function judgeHuiWen($s)
    {
        $tlen = strlen($s);
        if ($tlen == 1) {
            return true;
        }
        $len = ($tlen & 1 ? ($tlen - 1) / 2 : $tlen / 2);
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i] !== $s[$tlen - $i - 1]) {
                return false;
            }
        }
        return true;
    }
}

/*
 *
 */

//var_dump((new Solution())->judgeHuiWen('6'));
//var_dump((new Solution())->judgeHuiWen('25'));
//var_dump((new Solution())->judgeHuiWen('2552'));
//var_dump((new Solution())->judgeHuiWen('111222'));
var_dump((new Solution())->largestPalindrome(1));
var_dump((new Solution())->largestPalindrome(2));
var_dump((new Solution())->largestPalindrome(3));
var_dump((new Solution())->largestPalindrome(4));
var_dump((new Solution())->largestPalindrome(5));
var_dump((new Solution())->largestPalindrome(6));
var_dump((new Solution())->largestPalindrome(7));
var_dump((new Solution())->largestPalindrome(8));

/*
执行用时：1872 ms, 在所有 PHP 提交中击败了100.00%的用户
内存消耗：18.8 MB, 在所有 PHP 提交中击败了100.00%的用户
通过测试用例：8 / 8

打表只要 4 ms
 */