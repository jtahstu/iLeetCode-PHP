<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/20 15:22
 * Des: 113. 路径总和 II
 *      https://leetcode.cn/problems/path-sum-ii/
 *      剑指 Offer 34. 二叉树中和为某一值的路径
 *      https://leetcode.cn/problems/er-cha-shu-zhong-he-wei-mou-yi-zhi-de-lu-jing-lcof/
 *      给你二叉树的根节点 root 和一个整数目标和 targetSum ，找出所有 从根节点到叶子节点 路径总和等于给定目标和的路径。
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

    public $targetSum = 0;
    public $res = [];

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Integer[][]
     */
    function pathSum($root, $targetSum)
    {
        $this->targetSum = $targetSum;
        $this->findPath($root, [], 0);
        return $this->res;
    }

    function findPath($root, $path, $pathSum)
    {
        if ($root == null) return;
        $pathSum += $root->val;
        if ($root->left == null && $root->right == null && $pathSum == $this->targetSum) {
            $path[] = $root->val;
            $this->res[] = $path;
            return;
        }
        $path[] = $root->val;
        if ($root->left != null) {
            $this->findPath($root->left, $path, $pathSum);
        }
        if ($root->right != null) {
            $this->findPath($root->right, $path, $pathSum);
        }
    }
}

/**
 * 看题解就是path是个栈, 将当前值入栈, 开始2边深搜, 找到叶子且路径和ok, 那path就是一个解了. 然后当前值出栈, 类似于回到上一层了, 所以path可以升级成类变量, 就不用每个函数传了
 * 咱这写法也没毛病, 就是每次都在path后面加上当前值, 深搜的过程中path一直在不断复制不断变长
 *
 * 执行用时：12 ms, 在所有 PHP 提交中击败了69.70%的用户
 * 内存消耗：37 MB, 在所有 PHP 提交中击败了45.45%的用户
 * 通过测试用例：115 / 115
 */