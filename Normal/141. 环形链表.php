<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 16:01
 * Desc: 141. 环形链表
 *       https://leetcode.cn/problems/linked-list-cycle/
 *       给你一个链表的头节点 head ，判断链表中是否有环。
 *       如果链表中有某个节点，可以通过连续跟踪 next 指针再次到达，则链表中存在环。 为了表示给定链表中的环，评测系统内部使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。注意：pos 不作为参数进行传递 。仅仅是为了标识链表的实际情况。
 *       如果链表中存在环 ，则返回 true 。 否则，返回 false 。
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
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head)
    {
        $l = $head;
        $r = $head;
        while ($r) {
            $l = $l->next;
            $r = $r->next;
            if(!$r || !$r->next) break;
            $r = $r->next;
            if($l === $r) return true;  //要用全等
        }
        return false;
    }
}

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了43.26%的用户
 * 内存消耗：21.9 MB, 在所有 PHP 提交中击败了84.40%的用户
 * 通过测试用例：21 / 21
 */