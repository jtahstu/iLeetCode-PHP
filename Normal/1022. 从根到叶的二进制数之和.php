<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/30 14:30
 * Des: 1022. 从根到叶的二进制数之和
 *      https://leetcode.cn/problems/sum-of-root-to-leaf-binary-numbers/
 *      给出一棵二叉树，其上每个结点的值都是 0 或 1 。每一条从根到叶的路径都代表一个从最高有效位开始的二进制数。
 *          例如，如果路径为 0 -> 1 -> 1 -> 0 -> 1，那么它表示二进制数 01101，也就是 13 。
 *      对树上的每一片叶子，我们都要找出从根到该叶子的路径所表示的数字。
 *      返回这些数字之和。题目数据保证答案是一个 32 位 整数。
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
    public $paths = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumRootToLeaf($root)
    {
        $this->dfs($root, []);
//        echo json_encode($this->paths);
        $res = 0;
        foreach ($this->paths as $path) {
            $res += bindec(implode('', $path));
        }
        return $res;
    }

    function dfs($root, $path)
    {
        $path[] = $root->val;
        if (!$root->left && !$root->right) {
            $this->paths[] = $path;
            return;
        }
        if ($root->left) $this->dfs($root->left, $path);
        if ($root->right) $this->dfs($root->right, $path);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了60.00%的用户
 * 内存消耗：19.3 MB, 在所有 PHP 提交中击败了20.00%的用户
 * 通过测试用例：63 / 63
 */

/**
 * 广搜也行, 相当于把值都加到子节点上, 然后子节点加到ans上
 * class Solution {
        public int sumRootToLeaf(TreeNode root) {
            int ans = 0;
            Deque<TreeNode> d = new ArrayDeque<>();
            d.addLast(root);
            while (!d.isEmpty()) {
                TreeNode poll = d.pollFirst();
                if (poll.left != null) {
                    poll.left.val = (poll.val << 1) + poll.left.val;
                    d.addLast(poll.left);
                }
                if (poll.right != null) {
                    poll.right.val = (poll.val << 1) + poll.right.val;
                    d.addLast(poll.right);
                }
                if (poll.left == null && poll.right == null) ans += poll.val;
            }
            return ans;
        }
    }
 * 作者：AC_OIer, 链接：https://leetcode.cn/problems/sum-of-root-to-leaf-binary-numbers/solution/by-ac_oier-1905/
 */