<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/17 12:02
 * Des: 剑指 Offer 25. 合并两个排序的链表
 *      https://leetcode.cn/problems/he-bing-liang-ge-pai-xu-de-lian-biao-lcof/
 *      输入两个递增排序的链表，合并这两个链表并使新链表中的节点仍然是递增排序的。
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $res = new ListNode(0);
        $cur = $res;
        while ($l1 != null && $l2 != null) {
            if ($l1->val <= $l2->val) {
                $cur->next = new ListNode($l1->val);
                $l1 = $l1->next;
            } else {
                $cur->next = new ListNode($l2->val);
                $l2 = $l2->next;
            }
            $cur = $cur->next;
        }
        if ($l1 != null) $cur->next = $l1;
        if ($l2 != null) $cur->next = $l2;
        return $res->next;
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.6 MB, 在所有 PHP 提交中击败了42.10%的用户
 * 通过测试用例：218 / 218
 */