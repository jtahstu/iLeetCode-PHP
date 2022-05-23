<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/23 15:38
 * Des: 110. 平衡二叉树
 *      https://leetcode.cn/problems/balanced-binary-tree/
 *      输入一棵二叉树的根节点，判断该树是不是平衡二叉树。如果某二叉树中任意节点的左右子树的深度相差不超过1，那么它就是一棵平衡二叉树。
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

    public $is_balanced = true;

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root)
    {
        $this->depth($root);
        return $this->is_balanced;
    }

    function depth($root)
    {
        if (!$root) return;
        $dl = $this->depth($root->left);
        $dr = $this->depth($root->right);
        if (abs($dr - $dl) > 1) {
            $this->is_balanced = false;
        }
        return 1 + max($dl, $dr);
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了94.55%的用户
 * 内存消耗：20.7 MB, 在所有 PHP 提交中击败了74.55%的用户
 * 通过测试用例：228 / 228
 */