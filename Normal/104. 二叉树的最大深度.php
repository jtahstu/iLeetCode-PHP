<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/23 15:37
 * Des: 104. 二叉树的最大深度
 *      https://leetcode.cn/problems/maximum-depth-of-binary-tree/
 *      输入一棵二叉树的根节点，求该树的深度。从根节点到叶节点依次经过的节点（含根、叶节点）形成树的一条路径，最长路径的长度为树的深度。
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
     * @return Integer
     */
    function maxDepth($root)
    {
        if (!$root) return 0;
        $res = 1;
        $nodes = [[$root, 1]];
        while ($nodes) { //层序遍历
            list($node, $d) = array_shift($nodes);
            $res = max($res, $d);
            if ($node->left || $node->right) $d++;
            if ($node->left) $nodes[] = [$node->left, $d];
            if ($node->right) $nodes[] = [$node->right, $d];
        }
        return $res;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了51.33%的用户
 * 内存消耗：20 MB, 在所有 PHP 提交中击败了98.00%的用户
 * 通过测试用例：39 / 39
 */

//递归写法也不错
//class Solution {
//    public int maxDepth(TreeNode root) {
//        if(root == null) return 0;
//        int nLeft = maxDepth(root.left);
//        int nRight = maxDepth(root.right);
//        return nLeft > nRight ? nLeft + 1 : nRight + 1;
//    }
//}