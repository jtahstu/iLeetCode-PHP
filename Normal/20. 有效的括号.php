<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 16:33
 * Desc: 20. 有效的括号
 *       https://leetcode.cn/problems/valid-parentheses/
 *       给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。
 *       有效字符串需满足：
 *          左括号必须用相同类型的右括号闭合。
 *          左括号必须以正确的顺序闭合。
 */

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $stack = [];
        $match = [')' => '(', ']' => '[', '}' => '{'];
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            if (!$stack || !isset($match[$s[$i]])) {
                array_unshift($stack, $s[$i]);
                continue;
            }
            if ($stack[0] == $match[$s[$i]]) {
                array_shift($stack);
            } else {
                return false;
            }
        }
        return empty($stack);
    }
}

/**
 * 模拟栈
 * 执行用时：40 ms, 在所有 PHP 提交中击败了18.35%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了44.96%的用户
 * 通过测试用例：91 / 91
 */