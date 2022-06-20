<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/20 16:10
 * Desc: 46. 全排列
 *      https://leetcode.cn/problems/permutations/
 *      给定一个不含重复数字的数组 nums ，返回其 所有可能的全排列 。你可以 按任意顺序 返回答案。
 */

class Solution {

    public $res = [];
    public $len = 0;
    public $nums = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        $this->nums = $nums;
        $this->len = count($nums);
        $this->dfs([]);
        return $this->res;
    }

    public function dfs($t)
    {
        if(count($t)==$this->len) {
            $this->res[] = $t;
            return;
        }
        for ($j = 0; $j < $this->len; $j++) {
            if(in_array($this->nums[$j], $t)) continue;
            $t[] = $this->nums[$j];
            $this->dfs($t);
            array_pop($t);
        }
    }
}

echo json_encode((new Solution)->permute([1,2,3,4]));

/**
 * 这里不需要设置起点, 每次都是往里面放一个
 * 执行用时：4 ms, 在所有 PHP 提交中击败了98.29%的用户
 * 内存消耗：19.3 MB, 在所有 PHP 提交中击败了9.40%的用户
 * 通过测试用例：26 / 26
 */