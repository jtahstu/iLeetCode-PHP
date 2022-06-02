<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/1 13:35
 * Des: 19. 删除链表的倒数第 N 个结点
 *      https://leetcode.cn/problems/remove-nth-node-from-end-of-list/
 *      给你一个链表，删除链表的倒数第 n 个结点，并且返回链表的头结点。
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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $l = $head;
        $r = $head;
        for ($i = 0; $i < $n - 1; $i++) {
            $r = $r->next;
        }
        $l = new ListNode();
        $l->next = $head;
        $res = $l;
        if (!$r->next) return $head->next;
        while ($r) {
            $r = $r->next;
            $l = $l->next;
            if (!$r->next) {
                $l->next = $l->next->next;
                return $res->next;
            }
        }
    }
}

/**
 * 双指针
 * 执行用时：12 ms, 在所有 PHP 提交中击败了18.05%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了68.29%的用户
 * 通过测试用例：208 / 208
 */

//这是比较简洁的写法
//class Solution
//{
//    public function removeNthFromEnd($head, $n)
//    {
//        $dummy = new ListNode(null);
//        $dummy->next = $head;
//        $fast = $slow = $dummy;
//        for ($i = 0; $i <= $n; ++$i) {
//            $fast = $fast->next;
//        }
//
//        while ($fast !== null) {
//            $fast = $fast->next;
//            $slow = $slow->next;
//        }
//
//        $slow->next = $slow->next->next;
//
//        return $dummy->next;
//    }
//}