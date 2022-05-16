<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/16 19:37
 * Des: 剑指 Offer 22. 链表中倒数第k个节点
 *      https://leetcode.cn/problems/lian-biao-zhong-dao-shu-di-kge-jie-dian-lcof/
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
     * @param Integer $k
     * @return ListNode
     */
    function getKthFromEnd($head, $k)
    {
        //第一想法就是2次遍历, 然鹅更好的是双指针, 1次遍历就行了
        $end = $head;
        for ($i = 0; $i < $k; $i++) {
            $end = $end->next;
        }
        $cur = $head;
        while ($end != null) {
            $end = $end->next;
            $cur = $cur->next;
        }
        return $cur;
    }
}

/**
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了66.04%的用户
 * 通过测试用例：208 / 208
 */