<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/17 23:36
 * Des: 2181. 合并零之间的节点
 *      https://leetcode.cn/problems/merge-nodes-in-between-zeros/
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
     * @return ListNode
     */
    function mergeNodes($head)
    {
        $res = new ListNode(0);
        $cur = $res;
        $sum = 0;
        while ($head != null) {
            if ($head->val === 0 && $sum > 0) {
                $cur->next = new ListNode($sum);
                $cur = $cur->next;
                $sum = 0;
            }
            $sum += $head->val;
            $head = $head->next;
        }
        return $res->next;
    }
}

/**
 * 执行用时：504 ms, 在所有 PHP 提交中击败了80.00%的用户
 * 内存消耗：98 MB, 在所有 PHP 提交中击败了60.00%的用户
 * 通过测试用例：39 / 39
 */