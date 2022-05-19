<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/19 8:59
 * Des: 剑指 Offer 12. 矩阵中的路径
 *      https://leetcode.cn/problems/ju-zhen-zhong-de-lu-jing-lcof/
 *      79. 单词搜索
 *      https://leetcode.cn/problems/word-search/
 */

class Solution
{

    public $board = [];
    public $n = 0;
    public $m = 0;
    public $word = '';
    public $word_len = 0;

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word)
    {
        $this->board = $board;
        $this->word = $word;
        $this->word_len = strlen($word);
        $this->n = count($board);
        $this->m = count($board[0]);
        for ($i = 0; $i < $this->n; $i++) {
            for ($j = 0; $j < $this->m; $j++) {
                if ($this->board[$i][$j] == $word[0] && $this->dfs($i, $j, 0))
                    return true;
            }
        }
        return false;
    }

    public function dfs($i, $j, $match_count)
    {
        //匹配到要找的字符串长度时, 表示找到了
        if ($match_count == $this->word_len) return true;
        //越界或者当前字符不一样时, 返回false
        if ($i < 0 || $j < 0 || $i >= $this->n || $j >= $this->m || $this->word[$match_count] != $this->board[$i][$j]) return false;
        $this->board[$i][$j] = 1;

        $paths = [[1, 0], [-1, 0], [0, 1], [0, -1]];
        foreach ($paths as $path) {
            if ($this->dfs($i + $path[0], $j + $path[1], $match_count + 1))
                return true;
        }

        $this->board[$i][$j] = $this->word[$match_count];
        return false;
    }
}

var_dump((new Solution)->exist([["A", "B", "C", "E"], ["S", "F", "C", "S"], ["A", "D", "E", "E"]], "ABCCEE"));

/**
 * 执行用时：1632 ms, 在所有 PHP 提交中击败了68.18%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了86.36%的用户
 * 通过测试用例：83 / 83
 *
 * 执行用时：92 ms, 在所有 PHP 提交中击败了74.14%的用户
 * 内存消耗：22.5 MB, 在所有 PHP 提交中击败了91.38%的用户
 * 通过测试用例：87 / 87
 */