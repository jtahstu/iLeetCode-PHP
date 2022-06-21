<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/21 13:57
 * Desc: 101. 对称二叉树
 *      https://leetcode.cn/problems/symmetric-tree/
 *      给你一个二叉树的根节点 root ， 检查它是否轴对称。
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
     * @return Boolean
     */
    function isSymmetric($root)
    {
        $items = [$root];
        if(!$root) return true;
        while ($items) {
            $nodes = [];
            $vals = [];
            foreach ($items as $item) {
                $vals[] = $item ? $item->val : null;
                $nodes[] = $item->left ? $item->left : null;
                $nodes[] = $item->right ? $item->right : null;
            }
            if ($vals !== array_reverse($vals)) return false;
            if (!array_diff($vals,[null])) return true;
            $items = $nodes;
        }
        return true;
    }
}

/**
 * 执行用时：3112 ms, 在所有 PHP 提交中击败了6.50%的用户
 * 内存消耗：661.8 MB, 在所有 PHP 提交中击败了6.50%的用户
 * 通过测试用例：198 / 198
 */

// 递归这样写
//class Solution {
//    public boolean isSymmetric(TreeNode root) {
//        return check(root, root);
//    }
//
//    public boolean check(TreeNode p, TreeNode q) {
//        if (p == null && q == null) {
//            return true;
//        }
//        if (p == null || q == null) {
//            return false;
//        }
//        return p.val == q.val && check(p.left, q.right) && check(p.right, q.left);
//    }
//}