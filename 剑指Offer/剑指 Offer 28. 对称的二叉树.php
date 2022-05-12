<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/12 18:49
 * Des: 剑指 Offer 28. 对称的二叉树
 *      https://leetcode.cn/problems/dui-cheng-de-er-cha-shu-lcof/
 *      请实现一个函数，用来判断一棵二叉树是不是对称的。如果一棵二叉树和它的镜像一样，那么它是对称的。
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
     * @return Boolean
     */
    function isSymmetric($root)
    {
        if ($root == null) return true;
        return $this->judge($root->left, $root->right);
    }

    function judge($l, $r)
    {
//        print_r([$l,$r]);
        if ($l == null && $r) return false;
        if ($l && $r == null) return false;
        if ($l->val != $r->val) return false;

        if ($l->left == null && $l->right == null && $r->left == null && $r->right == null
            && $l->val == $r->val) {
            return true;
        }

        //以上写的有点麻烦, 官解是下面三个判断
        if ($l == null && $r == null) return true;
        if ($l == null || $r == null) return false;
        if ($l->val != $r->val) return false;

        return $this->judge($l->left, $r->right) && $this->judge($l->right, $r->left);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了94.74%的用户
 * 内存消耗：19.1 MB, 在所有 PHP 提交中击败了10.53%的用户
 * 通过测试用例：195 / 195
 */