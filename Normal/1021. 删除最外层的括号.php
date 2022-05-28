<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 9:49
 * Des: 1021. 删除最外层的括号
 *      https://leetcode.cn/problems/remove-outermost-parentheses/
 *      对 s 进行原语化分解，删除分解中每个原语字符串的最外层括号，返回 s 。
 */

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function removeOuterParentheses($s)
    {
        $res = '';
        $count = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                if ($count > 0) {
                    $res .= '(';
                }
                $count++;
            } else {
                $count--;
                if ($count > 0) {
                    $res .= ')';
                }
            }
        }
        return $res;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了66.67%的用户
 * 通过测试用例：59 / 59
 */