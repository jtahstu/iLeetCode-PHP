<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/7 18:20
 * Des: 剑指 Offer 24. 反转链表
 *      https://leetcode.cn/problems/fan-zhuan-lian-biao-lcof/
 *      定义一个函数，输入一个链表的头节点，反转该链表并输出反转后链表的头节点。
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
     * @return ListNode
     */
    function reverseList($head)
    {
        $items = [$head->val];
        while ($head->next !== null) {
            $head = $head->next;
            $items[] = $head->val;
        }
        $list = new ListNode(-1);
        $cur = $list;
        for ($i = count($items) - 1; $i >= 0; $i--) {
            $cur->next = new ListNode($items[$i]);
            $cur = $cur->next;
        }
        return $list->next;
    }

    function reverseList2($head)
    {
        $prev = null;
        $cur = $head;
        while ($cur !== null) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }
        return $prev;
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了92.47%的用户
 * 内存消耗：20.8 MB, 在所有 PHP 提交中击败了5.37%的用户
 * 通过测试用例：27 / 27
 */

/**
 * class Solution {
    public ListNode reverseList(ListNode head) {
        ListNode prev = null;
        ListNode curr = head;
        while (curr != null) {
            ListNode next = curr.next;
            curr.next = prev;
            prev = curr;
            curr = next;
        }
        return prev;
    }
}

作者：LeetCode-Solution
链接：https://leetcode.cn/problems/fan-zhuan-lian-biao-lcof/solution/fan-zhuan-lian-biao-by-leetcode-solution-jvs5/
来源：力扣（LeetCode）
著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
 */

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了67.72%的用户
 * 内存消耗：19.6 MB, 在所有 PHP 提交中击败了98.03%的用户
 * 通过测试用例：28 / 28
 */