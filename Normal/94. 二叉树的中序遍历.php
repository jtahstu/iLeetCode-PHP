<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/17 10:28
 * Desc: 94. 二叉树的中序遍历
 *       https://leetcode.cn/problems/binary-tree-inorder-traversal/
 *       给定一个二叉树的根节点 root ，返回 它的 中序 遍历 。
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
    function inorderTraversal($root) {
        $this->dfs($root);
        return $this->items;
    }

    function dfs($root)
    {
        if ($root == null) return;
        $this->dfs($root->left);
        $this->items[] = $root->val;
        $this->dfs($root->right);
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了61.05%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了62.21%的用户
 * 通过测试用例：70 / 70
 */