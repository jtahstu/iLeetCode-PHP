<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/7 23:29
 * Des: 剑指 Offer 35. 复杂链表的复制
 *      https://leetcode.cn/problems/fu-za-lian-biao-de-fu-zhi-lcof/
 *      请实现 copyRandomList 函数，复制一个复杂链表。在复杂链表中，每个节点除了有一个 next 指针指向下一个节点，还有一个 random 指针指向链表中的任意节点或者 null。
 */

//本题限制了PHP提交, 你是不是歧视PHP (•́へ•́╬)

//"""
//# Definition for a Node.
//class Node:
//    def __init__(self, x: int, next: 'Node' = None, random: 'Node' = None):
//        self.val = int(x)
//        self.next = next
//        self.random = random
//"""
//class Solution:
//    def copyRandomList(self, head: 'Node') -> 'Node':
//        if not head: return
//    dic = {}
//        # 3. 复制各节点，并建立 “原节点 -> 新节点” 的 Map 映射
//        cur = head
//        while cur:
//            dic[cur] = Node(cur.val)
//            cur = cur.next
//        cur = head
//        # 4. 构建新节点的 next 和 random 指向
//        while cur:
//            dic[cur].next = dic.get(cur.next)
//            dic[cur].random = dic.get(cur.random)
//            cur = cur.next
//        # 5. 返回新链表的头节点
//        return dic[head]

/**
 * 执行用时：40 ms, 在所有 Python3 提交中击败了80.72%的用户
 * 内存消耗：15.6 MB, 在所有 Python3 提交中击败了95.46%的用户
 * 通过测试用例：18 / 18
 */