<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 16:31
 * Desc: 206. 反转链表
 *       https://leetcode.cn/problems/reverse-linked-list/
 *       给你单链表的头节点 head ，请你反转链表，并返回反转后的链表。
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
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $prev = null;
        $cur = $head;
        while ($cur !== null) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }
        return $prev;
    }
}