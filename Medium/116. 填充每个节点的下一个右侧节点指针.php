<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/6 13:39
 * Des: 116. 填充每个节点的下一个右侧节点指针
 *      https://leetcode.cn/problems/populating-next-right-pointers-in-each-node/
 *      给定一个 完美二叉树 ，其所有叶子节点都在同一层，每个父节点都有两个子节点。
 *      填充它的每个 next 指针，让这个指针指向其下一个右侧节点。如果找不到下一个右侧节点，则将 next 指针设置为 NULL。
 */

/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */
class Solution
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        if ($root == null || $root->left == null)
            return $root;
        $root->left->next = $root->right;
        if ($root->next != null) {
            $root->right->next = $root->next->left;
        }
        $this->connect($root->left);
        $this->connect($root->right);
        return $root;
    }
}

/**
 * 执行用时：20 ms, 在所有 PHP 提交中击败了82.05%的用户
 * 内存消耗：22.3 MB, 在所有 PHP 提交中击败了25.64%的用户
 * 通过测试用例：59 / 59
 */