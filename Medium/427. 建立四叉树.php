<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/29 17:49
 * Des: 427. 建立四叉树
 *      https://leetcode-cn.com/problems/construct-quad-tree/
 *      题目过长
 */

//Definition for a QuadTree node.
class Node
{
    public $val = null;
    public $isLeaf = null;
    public $topLeft = null;
    public $topRight = null;
    public $bottomLeft = null;
    public $bottomRight = null;

    function __construct($val, $isLeaf)
    {
        $this->val = $val;
        $this->isLeaf = $isLeaf;
        $this->topLeft = null;
        $this->topRight = null;
        $this->bottomLeft = null;
        $this->bottomRight = null;
        echo "$isLeaf, $val\n";
    }
}

class Solution
{
    public $grid = [];

    /**
     * @param Integer[][] $grid
     * @return Node
     */
    function construct($grid)
    {
        $this->grid = $grid;
        $n = count($grid);
        return $this->dfs(0, 0, $n - 1, $n - 1);
    }

    function dfs($a, $b, $c, $d)
    {
        $is_leaf = true;
        $val = $this->grid[$a][$b];
        if ($a == $c && $b == $d) {
            return new Node($val, $is_leaf);
        }
        //判断矩形里的值是否都相同
        for ($i = $a; $i <= $c; $i++) {
            for ($j = $b; $j <= $d; $j++) {
                if ($this->grid[$i][$j] != $val) {
                    $is_leaf = false;
                    break 2;
                }
            }
        }
        //是子节点就不用再递归了
        if ($is_leaf) {
            return new Node($val, $is_leaf);
        }

        $node = new Node($val, $is_leaf);
        $g = ($a + $c + 1) / 2;  //x轴中点靠右
        $k = ($b + $d + 1) / 2;  //y轴中点靠右
        $node->topLeft = $this->dfs($a, $b, $g - 1, $k - 1);
        $node->topRight = $this->dfs($a, $k, $g - 1, $d);
        $node->bottomLeft = $this->dfs($g, $b, $c, $k - 1);
        $node->bottomRight = $this->dfs($g, $k, $c, $d);
        return $node;
    }
}

(new Solution())->construct([[1, 1, 1, 1, 0, 0, 0, 0], [1, 1, 1, 1, 0, 0, 0, 0], [1, 1, 1, 1, 1, 1, 1, 1], [1, 1, 1, 1, 1, 1, 1, 1], [1, 1, 1, 1, 0, 0, 0, 0], [1, 1, 1, 1, 0, 0, 0, 0], [1, 1, 1, 1, 0, 0, 0, 0], [1, 1, 1, 1, 0, 0, 0, 0]]);
//(new Solution())->construct([[0, 1], [1, 0]]);

/**
 * 执行用时：28 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：22 / 22
 */

/**
 * 使用前缀和优化「判断全 0 和全 1」的操作
 * 暴力就是会出现重复判断的情况, 前缀和就直接能判断出来, 速度会快一些
 * class Solution {
    static int[][] sum = new int[70][70];
    int[][] g;
    public Node construct(int[][] grid) {
        g = grid;
        int n = grid.length;
        for (int i = 1; i <= n; i++) {
            for (int j = 1; j <= n; j++) {
                sum[i][j] = sum[i - 1][j] + sum[i][j - 1] - sum[i - 1][j - 1] + g[i - 1][j - 1];
            }
        }
        return dfs(0, 0, n - 1, n - 1);
    }
    Node dfs(int a, int b, int c, int d) {
        int cur = sum[c + 1][d + 1] - sum[a][d + 1] - sum[c + 1][b] + sum[a][b];
        int dx = c - a + 1, dy = d - b + 1, tot = dx * dy;
        if (cur == 0 || cur == tot) return new Node(g[a][b] == 1, true);
        Node root = new Node(g[a][b] == 1, false);
        root.topLeft = dfs(a, b, a + dx / 2 - 1, b + dy / 2 - 1);
        root.topRight = dfs(a, b + dy / 2, a + dx / 2 - 1, d);
        root.bottomLeft = dfs(a + dx / 2, b, c, b + dy / 2 - 1);
        root.bottomRight = dfs(a + dx / 2, b + dy / 2, c, d);
        return root;
    }
}

作者：AC_OIer
链接：https://leetcode-cn.com/problems/construct-quad-tree/solution/by-ac_oier-maul/
 */