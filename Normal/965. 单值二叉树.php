<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/24 8:51
 * Des: 965. 单值二叉树
 *      https://leetcode.cn/problems/univalued-binary-tree/
 *      如果二叉树每个节点都具有相同的值，那么该二叉树就是单值二叉树。
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
    function isUnivalTree($root)
    {
        $val = $root->val;
        $nodes = [$root];
        while ($nodes) {
            $cur = array_shift($nodes);
            if ($cur->val != $val) return false;
            if ($cur->left) $nodes[] = $cur->left;
            if ($cur->right) $nodes[] = $cur->right;
        }
        return true;
    }
}

/**
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了40.00%的用户
 * 通过测试用例：72 / 72
 */