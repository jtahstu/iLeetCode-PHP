<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/7 15:07
 * Des: 160. 相交链表
 *      https://leetcode.cn/problems/intersection-of-two-linked-lists/
 *      给你两个单链表的头节点 headA 和 headB ，请你找出并返回两个单链表相交的起始节点。如果两个链表不存在相交节点，返回 null 。
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB)
    {
        if (!$headA || !$headB) return null;
        $h1 = $headA;
        $h2 = $headB;
        //这里得用全等, 不然第一个测试用例过不了, 会卡在同为1的那个位置
        while ($h1 !== $h2) {
            $h1 = $h1 ? $h1->next : $headB;
            $h2 = $h2 ? $h2->next : $headA;
        }
        return $h1;
    }
}

/**
 * 让 p1 遍历完链表 A 之后开始遍历链表 B，让 p2 遍历完链表 B 之后开始遍历链表 A，这样相当于「逻辑上」两条链表接在了一起。
 * 如果这样进行拼接，就可以让 p1 和 p2 同时进入公共部分，也就是同时到达相交节点 c1
 *
 * 执行用时：40 ms, 在所有 PHP 提交中击败了39.47%的用户
 * 内存消耗：27.5 MB, 在所有 PHP 提交中击败了71.05%的用户
 * 通过测试用例：39 / 39
 */