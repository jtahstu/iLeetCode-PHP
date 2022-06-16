<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 16:14
 * Desc: 203. 移除链表元素
 *       https://leetcode.cn/problems/remove-linked-list-elements/
 *       给你一个链表的头节点 head 和一个整数 val ，请你删除链表中所有满足 Node.val == val 的节点，并返回 新的头节点 。
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
     * @param Integer  $val
     * @return ListNode
     */
    function removeElements($head, $val)
    {
        $pre = new ListNode(0);
        $pre->next = $head;
        $res = $pre;
        $cur = $head;
        while ($cur) {
            if ($cur->val == $val) {
                $pre->next = $pre->next->next;
            } else {
                $pre = $pre->next;
            }
            $cur = $cur->next;
        }
        return $res->next;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了85.00%的用户
 * 内存消耗：22 MB, 在所有 PHP 提交中击败了65.00%的用户
 * 通过测试用例：66 / 66
 */