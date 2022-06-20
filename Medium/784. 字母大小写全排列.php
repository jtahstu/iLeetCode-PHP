<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/20 16:42
 * Desc: 784. 字母大小写全排列
 *      https://leetcode.cn/problems/letter-case-permutation/
 *      给定一个字符串 s ，通过将字符串 s 中的每个字母转变大小写，我们可以获得一个新的字符串。
 *      返回 所有可能得到的字符串集合 。以 任意顺序 返回输出。
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
    function letterCasePermutation($s)
    {
        $this->s = $s;
        $this->len = strlen($s);
        $this->dfs(0, []);
        return $this->res;
    }

    public function dfs($i, $t)
    {
        if ($i == $this->len) {
            $this->res[] = implode('', $t);
            return;
        }
        if (!is_numeric($this->s[$i])) {
            $t[] = strtolower($this->s[$i]);;
            $this->dfs($i + 1, $t);
            array_pop($t);

            $t[] = strtoupper($this->s[$i]);
            $this->dfs($i + 1, $t);
            array_pop($t);
        } else {
            $t[] = $this->s[$i];
            $this->dfs($i + 1, $t);
        }
    }
}

print_r((new Solution)->letterCasePermutation("a1b2"));
//["a1b2", "a1B2", "A1b2", "A1B2"]

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了54.55%的用户
 * 内存消耗：20.4 MB, 在所有 PHP 提交中击败了18.18%的用户
 * 通过测试用例：63 / 63
 */