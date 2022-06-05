<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/6 0:37
 * Des: 567. 字符串的排列
 *      https://leetcode.cn/problems/permutation-in-string/
 *      给你两个字符串 s1 和 s2 ，写一个函数来判断 s2 是否包含 s1 的排列。如果是，返回 true ；否则，返回 false 。
 *      换句话说，s1 的排列之一是 s2 的 子串 。
 */

class Solution
{

//    public $s1 = '';
//    public $s1_len = 0;
//    public $s2 = '';
//    public $res = false;

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $l = 0;
        $s1_len = strlen($s1);
        $s2_len = strlen($s2);
        while ($l <= $s2_len - $s1_len) {
            $s2_part = substr($s2, $l, $s1_len);
            $res = $this->judge($s1, $s2_part);
            if ($res === true) return true;
            $l += $res + 1; //如果不是子串, 那么从未找到的那个字符下一个位置再次截取并判断
        }
        return false;
    }

    function judge($s1, $s2)
    {
        $s1_hash = [];
        $len = strlen($s1);
        for ($i = 0; $i < $len; $i++) {
            $s1_hash[$s1[$i]] = isset($s1[$i]) ? $s1_hash[$s1[$i]] + 1 : 1;
        }
        $count = 0;
        for ($i = 0; $i < $len; $i++) {
            if (!isset($s1_hash[$s2[$i]]) || $s1_hash[$s2[$i]] == 0) return strpos($s2, $s2[$i]); //因为s2[$i]可能会重复出现, 所以返回第一个位置
            $s1_hash[$s2[$i]]--;
            $count++;
        }
        return true;
    }

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     * 不能算s1的全排列, 会在s1="dinitrophenylhydrazine" s2="acetylphenylhydrazine"时超时
     */
//    function checkInclusion2($s1, $s2)
//    {
//        $this->s1 = $s1;
//        $this->s1_len = strlen($s1);
//        $this->s2 = $s2;
//        $this->dfs(0);
//        return $this->res;
//    }
//
//    function dfs($i)
//    {
//        if ($i >= $this->s1_len) echo $this->s1 . PHP_EOL;
//        if ($this->res) return;
//        if ($i >= $this->s1_len && strpos($this->s2, $this->s1) !== false) {
//            $this->res = true;
//            return;
//        }
//        for ($j = $i; $j < $this->s1_len; $j++) {
//            [$this->s1[$i], $this->s1[$j]] = [$this->s1[$j], $this->s1[$i]];
//            $this->dfs($i + 1);
//            if ($this->res) return;
//            [$this->s1[$j], $this->s1[$i]] = [$this->s1[$i], $this->s1[$j]];
//        }
//    }
}

/**
 * 返回未找到的位置, 会剪枝不少重复判断
 * 执行用时：168 ms, 在所有 PHP 提交中击败了7.41%的用户
 * 内存消耗：18.9 MB, 在所有 PHP 提交中击败了37.04%的用户
 * 通过测试用例：107 / 107
 *
 * 48行这里不优化, 直接返回false, 就是每个位置都开始检查, 竟然也能过, 正常应该是超时的, 毕竟都O(nm)
 * 执行用时：2560 ms, 在所有 PHP 提交中击败了7.41%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了48.15%的用户
 * 通过测试用例：107 / 107
 */