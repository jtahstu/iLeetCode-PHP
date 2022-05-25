<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/25 14:01
 * Des: 剑指 Offer 07. 重建二叉树
 *      https://leetcode.cn/problems/zhong-jian-er-cha-shu-lcof/
 *      输入某二叉树的前序遍历和中序遍历的结果，请构建该二叉树并返回其根节点。
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

    public $preorder = [];
    public $map = [];

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     * 前序遍历 preorder: 根 -- 左 -- 右   第一个肯定是根节点
     * 中序遍历 inorder: 左 -- 根 -- 右
     */
    function buildTree($preorder, $inorder)
    {
        $this->preorder = $preorder;
        for ($i = 0; $i < count($inorder); $i++) {
            $this->map[$inorder[$i]] = $i;
        }
        return $this->rebuild(0, 0, count($inorder) - 1);
    }

    // pre_root_index : 根节点 在 前序遍历中的下标
    // in_left_index: 该节点在中序遍历中的左边界
    // in_right_index: 该节点在中序遍历中的右边界
    function rebuild($pre_root_index, $in_left_index, $in_right_index)
    {
        if ($in_left_index > $in_right_index) return null;
        // 根节点在中序遍历中的位置：in_root_index
        $in_root_index = $this->map[$this->preorder[$pre_root_index]];
        // 创建一个根节点
        $node = new TreeNode($this->preorder[$pre_root_index]);
        // 寻找node的左节点:
        // 在前序遍历中的位置就是  根节点的下标 + 1（右边一个单位）
        // 在中序遍历中的位置就是： 1. 左边界不变，2. 右边界就是根节点的左边一个单位 in_root_index - 1
        $node->left = $this->rebuild($pre_root_index + 1, $in_left_index, $in_root_index - 1);
        // 寻找node的右节点:
        // 在前序遍历中的位置就是  根节点的下标 + 左子树长度 + 1
        // 在中序遍历中的位置就是： 1. 左边界在根节点的右边一个单位  in_root_index + 1, 2. 右边界不变
        $node->right = $this->rebuild($pre_root_index + $in_root_index - $in_left_index + 1, $in_root_index + 1, $in_right_index);
        return $node;
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了81.25%的用户
 * 内存消耗：21 MB, 在所有 PHP 提交中击败了93.75%的用户
 * 通过测试用例：203 / 203
 */