<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/19 20:05
 * Des: 剑指 Offer II 029. 排序的循环链表
 *      https://leetcode.cn/problems/4ueAj6/
 *      给定循环单调非递减列表中的一个点，写一个函数向这个列表中插入一个新元素 insertVal ，使这个列表仍然是循环升序的。
 *      给定的可以是这个列表中任意一个顶点的指针，并不一定是这个列表中最小元素的指针。
 *      如果有多个满足条件的插入位置，可以选择任意一个位置插入新的值，插入后整个列表仍然保持有序。
 *      如果列表为空（给定的节点是 null），需要创建一个循环有序列表并返回这个节点。否则。请返回原先给定的节点。
 */

/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $next = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->next = null;
 *     }
 * }
 */
class Solution
{
    /**
     * @param Node $root
     * @param Integer $insertVal
     * @return Node
     */
    function insert($head, $insertVal)
    {
        $res = $head;
        if (!$head) {
            $head = new Node($insertVal);
            $head->next = $head;
            return $head;
        }
        $list = [];
        while ($head) {
            $list[] = $head->val;
            $head = $head->next;
            if ($head === $res) break;
        }
        $flag = 0;
        $max = max($list);
        $min = min($list);
        if ($insertVal >= $max || $insertVal <= $min) $flag = 1;
        while ($head) {
            if (($insertVal >= $head->val && $insertVal < $head->next->val) || ($flag == 1 && $head->val === $max && ($head->next->val != $max || $head->next === $res))) {
                $t = $head->next;
                $head->next = new Node($insertVal);
                $head->next->next = $t;
                break;
            }
            $head = $head->next;
        }
        return $res;
    }
}

/**
 * 太坑了, WA了9次, 自己都懵逼了
 *
 * 执行用时：16 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：21.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：106 / 106
 */