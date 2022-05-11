<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/11 18:00
 * Des: 剑指 Offer 32 - I. 从上到下打印二叉树
 *      https://leetcode.cn/problems/cong-shang-dao-xia-da-yin-er-cha-shu-lcof/
 *      从上到下打印出二叉树的每个节点，同一层的节点按照从左到右的顺序打印。
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
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function levelOrder($root) {
        $items = [];
        $nodes = [$root];
        while($nodes) {        //层序遍历
            $node = array_shift($nodes);
            $items[] = $node->val;
            if ($node->left !== null) {
                $nodes[] = $node->left;
            }
            if ($node->right !== null) {
                $nodes[] = $node->right;
            }
        }
        return $items;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了75.68%的用户
 * 内存消耗：19.1 MB, 在所有 PHP 提交中击败了45.95%的用户
 * 通过测试用例：34 / 34
 */