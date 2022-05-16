<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/16 18:59
 * Des: 剑指 Offer 18. 删除链表的节点
 *      https://leetcode.cn/problems/shan-chu-lian-biao-de-jie-dian-lcof/
 */


//Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function deleteNode($head, $val)
    {
        if ($head->val == $val) return $head->next;
        $res = new ListNode($head->val);
        $cur = $head;
        while ($cur !== null) {
            if ($cur->val == $val) {
                $res->next = $cur->next;
                break;
            }
            $res->next = new ListNode($cur->val);
            $cur = $cur->next;
        }
        return $res;
    }
}

/**
 * 实际主要思想就是$res->next = $cur->next; 这样就把cur跳了
 * 我在这纠结老半天
 * 执行用时：4 ms, 在所有 PHP 提交中击败了97.22%的用户
 * 内存消耗：19.3 MB, 在所有 PHP 提交中击败了5.55%的用户
 * 通过测试用例：37 / 37
 */

//推荐
//class Solution {
//    public ListNode deleteNode(ListNode head, int val) {
//        if(head.val == val) return head.next;
//        ListNode pre = head, cur = head.next;
//        while(cur != null && cur.val != val) {
//            pre = cur;
//            cur = cur.next;
//        }
//        if(cur != null) pre.next = cur.next;
//        return head;
//    }
//}