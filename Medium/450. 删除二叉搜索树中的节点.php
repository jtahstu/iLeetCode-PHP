<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/2 18:51
 * Des: 450. 删除二叉搜索树中的节点
 *      https://leetcode.cn/problems/delete-node-in-a-bst/
 *      给定一个二叉搜索树的根节点 root 和一个值 key，删除二叉搜索树中的 key 对应的节点，并保证二叉搜索树的性质不变。返回二叉搜索树（有可能被更新）的根节点的引用。
 *      一般来说，删除节点可分为两个步骤：
 *          首先找到需要删除的节点；
 *          如果找到了，删除它。
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
class Solution
{

    /**
     * @param TreeNode $root
     * @param Integer $key
     * @return TreeNode
     */
    function deleteNode($root, $key)
    {
        if (!$root) return null;
        if ($root->val == $key) {
            if (!$root->left) return $root->right;
            if (!$root->right) return $root->left;
            //拿右子树的最小值替换当前节点
            $new_node = $this->getMin($root->right);
            //得先改右才能改左, 有点奇怪
            $new_node->right = $this->deleteNode($root->right, $new_node->val);
            $new_node->left = $root->left;
            $root = $new_node;
        } elseif ($key < $root->val) {
            $root->left = $this->deleteNode($root->left, $key);
        } else {
            $root->right = $this->deleteNode($root->right, $key);
        }
        return $root;
    }

    function getMin($root)
    {
        while ($root->left) $root = $root->left;
        return $root;
    }
}

/**
 * 执行用时：20 ms, 在所有 PHP 提交中击败了53.33%的用户
 * 内存消耗：23.2 MB, 在所有 PHP 提交中击败了53.33%的用户
 * 通过测试用例：91 / 91
 */