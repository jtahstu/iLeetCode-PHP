<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/7 18:10
 * Des: 剑指 Offer 06. 从尾到头打印链表
 *      https://leetcode.cn/problems/cong-wei-dao-tou-da-yin-lian-biao-lcof/
 *      输入一个链表的头节点，从尾到头反过来返回每个节点的值（用数组返回）。
 */

/**
 * Definition for a singly-linked list.
 */
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
     * @return Integer[]
     */
    function reversePrint($head)
    {
        //解法1
//        $list = [$head->val];
//        while ($head->next !== null) {
//            $head = $head->next;
//            $list = array_unshift($list, $head->val);
//        }
//        return $list;

        //解法2
        $list = [$head->val];
        while ($head->next !== null) {
            $head = $head->next;
            $list[] =$head->val;
        }
        return array_reverse($list);
    }
}

/**
 * 栈
 * 执行用时：208 ms, 在所有 PHP 提交中击败了7.07%的用户
 * 内存消耗：21.4 MB, 在所有 PHP 提交中击败了48.48%的用户
 * 通过测试用例：24 / 24
 *
 * 还是数组快
 * 执行用时：4 ms, 在所有 PHP 提交中击败了97.98%的用户
 * 内存消耗：21.3 MB, 在所有 PHP 提交中击败了76.77%的用户
 * 通过测试用例：24 / 24
 */