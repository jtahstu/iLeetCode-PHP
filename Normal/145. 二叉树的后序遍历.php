<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/17 10:29
 * Desc: 145. 二叉树的后序遍历
 *       https://leetcode.cn/problems/binary-tree-postorder-traversal/
 *       给你一棵二叉树的根节点 root ，返回其节点值的 后序遍历 。
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    public $items = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $this->dfs($root);
        return $this->items;
    }

    function dfs($root)
    {
        if ($root == null) return;
        $this->dfs($root->left);
        $this->dfs($root->right);
        $this->items[] = $root->val;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了63.51%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了14.86%的用户
 * 通过测试用例：68 / 68
 */