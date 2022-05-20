<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/20 16:46
 * Des: 剑指 Offer 36. 二叉搜索树与双向链表
 *      https://leetcode.cn/problems/er-cha-sou-suo-shu-yu-shuang-xiang-lian-biao-lcof/
 *      输入一棵二叉搜索树，将该二叉搜索树转换成一个排序的循环双向链表。要求不能创建任何新的节点，只能调整树中节点指针的指向。
 */

//本题无法PHP提交, 你是不是歧视PHP (•́へ•́╬)

//"""
//# Definition for a Node.
//class Node:
//    def __init__(self, val, left=None, right=None):
//        self.val = val
//        self.left = left
//        self.right = right
//"""
//class Solution:
//    def treeToDoublyList(self, root: 'Node') -> 'Node':
//        def dfs(cur):
//            if not cur: return
//    dfs(cur.left) # 递归左子树
//            if self.pre: # 修改节点引用
//                self.pre.right, cur.left = cur, self.pre
//            else: # 记录头节点
//                self.head = cur
//            self.pre = cur # 保存 cur
//            dfs(cur.right) # 递归右子树
//
//        if not root: return
//                self.pre = None
//        dfs(root)
//        self.head.left, self.pre.right = self.pre, self.head
//        return self.head