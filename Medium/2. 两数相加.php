<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/30 23:33
 * Des: 2. 两数相加
 *      https://leetcode-cn.com/problems/add-two-numbers/
 *      给你两个 非空 的链表，表示两个非负的整数。它们每位数字都是按照 逆序 的方式存储的，并且每个节点只能存储 一位 数字。
 *      请你将两个数相加，并以相同形式返回一个表示和的链表。
 *      你可以假设除了数字 0 之外，这两个数都不会以 0 开头。
 */


//Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $res = new ListNode(-1);
        $cur = $res;
        $s = 0;
        while ($l1 != null || $l2 != null || $s > 0) {
            $n = $s;
            if ($l1 != null) {
                $n += $l1->val;
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $n += $l2->val;
                $l2 = $l2->next;
            }
            $s = floor($n / 10);
            $cur->next = new ListNode($n % 10);
            $cur = $cur->next;
        }
        return $res->next;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了93.46%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了61.06%的用户
 * 通过测试用例：1568 / 1568
 */
 