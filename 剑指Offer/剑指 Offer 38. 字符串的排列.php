<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/3 21:41
 * Des: 剑指 Offer 38. 字符串的排列
 *      https://leetcode.cn/problems/zi-fu-chuan-de-pai-lie-lcof/
 *      输入一个字符串，打印出该字符串中字符的所有排列。
 */

class Solution
{

    public $res = [];
    public $len = 0;
    public $s = [];

    /**
     * @param String $s
     * @return String[]
     */
    function permutation($s)
    {
        $this->s = $s;
        $this->len = strlen($s);
        $this->dfs(0);
        return $this->res;
    }

    function dfs($i)
    {
        if ($i == $this->len - 1) {
            $this->res[] = $this->s;
            return;
        }
        $hash = [];
        for ($j = $i; $j < $this->len; $j++) {
            //重复字符不交换, 跳过
            if (isset($hash[$this->s[$j]])) continue;
            $hash[$this->s[$j]] = 1;
            [$this->s[$i], $this->s[$j]] = [$this->s[$j], $this->s[$i]];
            $this->dfs($i + 1);
            [$this->s[$j], $this->s[$i]] = [$this->s[$i], $this->s[$j]];
        }
    }

}

print_r((new Solution)->permutation('abca'));

/**
 * 执行用时：56 ms, 在所有 PHP 提交中击败了85.00%的用户
 * 内存消耗：26 MB, 在所有 PHP 提交中击败了95.00%的用户
 * 通过测试用例：52 / 52
 */