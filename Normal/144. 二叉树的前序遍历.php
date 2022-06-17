<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/17 10:26
 * Desc: 144. 二叉树的前序遍历
 *       https://leetcode.cn/problems/binary-tree-preorder-traversal/
 *       给你二叉树的根节点 root ，返回它节点值的 前序 遍历。
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
    function preorderTraversal($root) {
        $this->dfs($root);
        return $this->items;
    }

    function dfs($root)
    {
        if ($root == null) return;
        $this->items[] = $root->val;
        $this->dfs($root->left);
        $this->dfs($root->right);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了91.76%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了62.35%的用户
 * 通过测试用例：69 / 69
 */