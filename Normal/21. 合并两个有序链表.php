<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 14:58
 * Desc: 21. 合并两个有序链表
 *       https://leetcode.cn/problems/merge-two-sorted-lists/
 *       将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2)
    {
        $res = new ListNode(-1);
        $cur = $res;
        while ($list1 || $list2) {
            $l = 1;
            if (!$list1) $l = 2;
            if ($list1 && $list2 && $list1->val > $list2->val) $l = 2;
            if ($l == 1) {
                $cur->next = new ListNode($list1->val);
                $list1 = $list1->next;
            } else {
                $cur->next = new ListNode($list2->val);
                $list2 = $list2->next;
            }
            $cur = $cur->next;
        }
        return $res->next;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了67.49%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了10.60%的用户
 * 通过测试用例：208 / 208
 */