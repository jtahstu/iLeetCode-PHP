<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 16:26
 * Desc: 83. 删除排序链表中的重复元素
 *       https://leetcode.cn/problems/remove-duplicates-from-sorted-list/
 *       给定一个已排序的链表的头 head ， 删除所有重复的元素，使每个元素只出现一次 。返回 已排序的链表 。
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
    function deleteDuplicates($head) {
        $cur = $head;
        while ($cur->next) {
            if($cur->val == $cur->next->val) {
                $cur->next = $cur->next->next;
            } else {
                $cur = $cur->next;
            }
        }
        return $head;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了36.36%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了70.13%的用户
 * 通过测试用例：166 / 166
 */