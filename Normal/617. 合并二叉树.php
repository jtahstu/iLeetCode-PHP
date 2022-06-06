<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/6 1:51
 * Des: 617. 合并二叉树
 *      https://leetcode.cn/problems/merge-two-binary-trees/
 *      给你两棵二叉树： root1 和 root2 。
 *      想象一下，当你将其中一棵覆盖到另一棵之上时，两棵树上的一些节点将会重叠（而另一些不会）。你需要将这两棵树合并成一棵新二叉树。合并的规则是：如果两个节点重叠，那么将这两个节点的值相加作为合并后节点的新值；否则，不为 null 的节点将直接作为新二叉树的节点。
 *      返回合并后的二叉树。
 *      注意: 合并过程必须从两个树的根节点开始。
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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees($root1, $root2)
    {
        if (!$root1) return $root2;
        if (!$root2) return $root1;

        //这段可以不要, 一开始还考虑了
//        if (!$root1->left && !$root1->right) {
//            $root2->val += $root1->val;
//            return $root2;
//        }
//        if ($root2->left == null && $root2->right == null) {
//            $root1->val += $root2->val;
//            return $root1;
//        }
        $node = new TreeNode($root1->val + $root2->val);
        $node->left = $this->mergeTrees($root1->left, $root2->left);
        $node->right = $this->mergeTrees($root1->right, $root2->right);
        return $node;
    }
}

/**
 * 可以, 一遍过
 * 执行用时：16 ms, 在所有 PHP 提交中击败了86.00%的用户
 * 内存消耗：19.6 MB, 在所有 PHP 提交中击败了14.00%的用户
 * 通过测试用例：182 / 182
 *
 * 去掉注释那段, 代码简洁了, 执行时间慢点
 * 执行用时：20 ms, 在所有 PHP 提交中击败了70.00%的用户
 * 内存消耗：19.4 MB, 在所有 PHP 提交中击败了52.00%的用户
 * 通过测试用例：182 / 182
 */