<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/12 18:43
 * Des: 剑指 Offer 27. 二叉树的镜像
 *      https://leetcode.cn/problems/er-cha-shu-de-jing-xiang-lcof/
 *      请完成一个函数，输入一个二叉树，该函数输出它的镜像。
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function mirrorTree($root)
    {
        $this->treeMirror($root);
        return $root;
    }

    function treeMirror(&$root)
    {
        if ($root == null) {
            return;
        }
        $t = $root->left;
        $root->left = $root->right;
        $root->right = $t;
        $this->treeMirror($root->left);
        $this->treeMirror($root->right);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了89.66%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了62.07%的用户
 * 通过测试用例：68 / 68
 */