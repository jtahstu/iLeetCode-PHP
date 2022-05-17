<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/17 19:06
 * Des: 剑指 Offer 52. 两个链表的第一个公共节点
 *      https://leetcode.cn/problems/liang-ge-lian-biao-de-di-yi-ge-gong-gong-jie-dian-lcof/
 */

//本题限制了PHP提交, 你是不是歧视PHP (•́へ•́╬)

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
//func getIntersectionNode(headA, headB *ListNode) *ListNode {
//    if headA == nil || headB == nil {return nil}
//    p, q := headA, headB
//    for p != q {
//        if p == nil {
//            p = headB
//        } else {
//            p = p.Next
//        }
//        if q == nil {
//            q = headA
//        } else {
//            q = q.Next
//        }
//    }
//    return p
//}