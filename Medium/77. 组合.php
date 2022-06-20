<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/20 15:28
 * Desc: 77. 组合
 *      https://leetcode.cn/problems/combinations/
 *      给定两个整数 n 和 k，返回范围 [1, n] 中所有可能的 k 个数的组合。
 *      你可以按 任何顺序 返回答案。
 */

class Solution
{

    public $res = [];
    public $len = 0;
    public $nums = [];
    public $k = 0;

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k)
    {
        $this->nums = range(1, $n);
        $this->len = $n;
        $this->k = $k;
        $this->dfs(0, []);
        return $this->res;
    }

    public function dfs($i, $t)
    {
        if(count($t)==$this->k) {
            $this->res[] = $t;
            return;
        }
        if ($i == $this->len) return;
        for ($j = $i; $j < $this->len; $j++) {
            $t[] = $this->nums[$j];
            $this->dfs($j + 1, $t);
            array_pop($t);
        }
    }
}

echo json_encode((new Solution)->combine(6,3));

/**
 * 执行用时：124 ms, 在所有 PHP 提交中击败了29.60%的用户
 * 内存消耗：23.1 MB, 在所有 PHP 提交中击败了48.80%的用户
 * 通过测试用例：27 / 27
 */