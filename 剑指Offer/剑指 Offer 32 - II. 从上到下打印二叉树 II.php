<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/11 18:11
 * Des: 剑指 Offer 32 - II. 从上到下打印二叉树 II
 *      https://leetcode.cn/problems/cong-shang-dao-xia-da-yin-er-cha-shu-ii-lcof/
 *      从上到下按层打印二叉树，同一层的节点按从左到右的顺序打印，每一层打印到一行。
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
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if (!$root) {
            return [];
        }
        $items = [];
        $nodes = [[1, $root]];
        while ($nodes) {        //层序遍历
            list($l, $node) = array_shift($nodes);
            $items[$l][] = $node->val;
            $l++;
            if ($node->left !== null) {
                $nodes[] = [$l, $node->left];
            }
            if ($node->right !== null) {
                $nodes[] = [$l, $node->right];
            }
        }
        return array_values($items);
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了93.55%的用户
 * 内存消耗：19.3 MB, 在所有 PHP 提交中击败了58.06%的用户
 * 通过测试用例：34 / 34
 */

//不像我那样记录层级也行, 这里的$nodes数组都是同一个层级, 遍历一遍加到结果集里也可
//    public List<List<Integer>> levelOrder(TreeNode root) {
//        List<List<Integer>> ret = new ArrayList<List<Integer>>();
//        if (root == null) {
//            return ret;
//        }
//
//        Queue<TreeNode> queue = new LinkedList<TreeNode>();
//        queue.offer(root);
//        while (!queue.isEmpty()) {
//            List<Integer> level = new ArrayList<Integer>();
//            int currentLevelSize = queue.size();
//            for (int i = 1; i <= currentLevelSize; ++i) {
//                TreeNode node = queue.poll();
//                level.add(node.val);
//                if (node.left != null) {
//                    queue.offer(node.left);
//                }
//                if (node.right != null) {
//                    queue.offer(node.right);
//                }
//            }
//            ret.add(level);
//        }
//
//        return ret;
//    }