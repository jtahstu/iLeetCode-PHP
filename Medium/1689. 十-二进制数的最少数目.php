<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/3 22:46
 * Des: 1689. 十-二进制数的最少数目
 *      https://leetcode.cn/problems/partitioning-into-minimum-number-of-deci-binary-numbers/
 *      如果一个十进制数字不含任何前导零，且每一位上的数字不是 0 就是 1 ，那么该数字就是一个 十-二进制数 。例如，101 和 1100 都是 十-二进制数，而 112 和 3001 不是。
 *      给你一个表示十进制整数的字符串 n ，返回和为 n 的 十-二进制数 的最少数目。
 */

class Solution
{

    /**
     * 因为他这个十二进制数不限制位数, 那么直接就是取最大位数字即可, 因为总是能被1111...减掉
     * @param String $n
     * @return Integer
     */
    function minPartitions($n)
    {
        $max = -1;
        for ($i = 0; $i < strlen($n); $i++) {
            if (intval($n[$i]) > $max) $max = intval($n[$i]);
        }
        return $max;
    }
}

var_dump((new Solution)->minPartitions("32"));
var_dump((new Solution)->minPartitions("82734"));
var_dump((new Solution)->minPartitions("27346209830709182346"));

/**
 * 执行用时：40 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：97 / 97
 */