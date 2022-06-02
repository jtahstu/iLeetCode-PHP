<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/1 13:26
 * Des: 876. 链表的中间结点
 *      https://leetcode.cn/problems/middle-of-the-linked-list/
 *      给定一个头结点为 head 的非空单链表，返回链表的中间结点。如果有两个中间结点，则返回第二个中间结点。
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head)
    {
        $n = 0;
        $cur = $head;
        while ($cur) {
            $n++;
            $cur = $cur->next;
        }
        $mid = ($n >> 1) + 1;
        $cur = $head;
        $i = 0;
        while ($cur) {
            $i++;
            if ($i == $mid) return $cur;
            $cur = $cur->next;
        }
        return new ListNode();
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了92.04%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了39.82%的用户
 * 通过测试用例：36 / 36
 */

//双指针题还是下面这个思想好些
//思路：快指针q每次走2步，慢指针p每次走1步，当q走到末尾时p正好走到中间。