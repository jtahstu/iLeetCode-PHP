<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/15 23:49
 * Des: 385. 迷你语法分析器
 *      https://leetcode-cn.com/problems/mini-parser/
 *      给定一个字符串 s 表示一个整数嵌套列表，实现一个解析它的语法分析器并返回解析的结果 NestedInteger ,
        列表中的每个元素只可能是整数或整数嵌套列表
 */


/**
 * // This is the interface that allows for creating nested lists.
 * // You should not implement it, or speculate about its implementation
 * class NestedInteger {
 *     // if value is not specified, initializes an empty list.
 *     // Otherwise initializes a single integer equal to value.
 *     function __construct($value = null)
 *     // Return true if this NestedInteger holds a single integer, rather than a nested list.
 *     function isInteger() : bool
 *
 *     // Return the single integer that this NestedInteger holds, if it holds a single integer
 *     // The result is undefined if this NestedInteger holds a nested list
 *     function getInteger()
 *
 *     // Set this NestedInteger to hold a single integer.
 *     function setInteger($i) : void
 *
 *     // Set this NestedInteger to hold a nested list and adds a nested integer to it.
 *     function add($ni) : void
 *
 *     // Return the nested list that this NestedInteger holds, if it holds a nested list
 *     // The result is undefined if this NestedInteger holds a single integer
 *     function getList() : array
 * }
 */
class Solution
{

    /**
     * @param String $s
     * @return NestedInteger
     */
    function deserialize($s)
    {
        if ($s === '') {
            return new NestedInteger();
        }
        if ($s[0] != '[') {
            return new NestedInteger(intval($s));
        }
        if (strlen($s) <= 2) {
            return NestedInteger();
        }
        $res = new NestedInteger();
        $start = 1;
        $cnt = 0;
        for ($i = 1; $i < strlen($s); $i++) {
            if ($cnt == 0 && ($s[$i] == ',' || $i == strlen($s) - 1)) {
                $res->add($this->deserialize(substr($s, $start, $i - $start)));
                $start = $i + 1;
            } else if ($s[$i] == '[') {
                $cnt++;
            } else if ($s[$i] == ']') {
                $cnt--;
            }
        }
        return $res;
    }
}

/*
 * 抄答案的
 *
执行用时：20 ms, 在所有 PHP 提交中击败了60.00%的用户
内存消耗：20.7 MB, 在所有 PHP 提交中击败了100.00%的用户
通过测试用例：58 / 58
 */