<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/27 7:21
 * Des: 面试题 17.11. 单词距离
 *      https://leetcode.cn/problems/find-closest-lcci/
 *      有个内含单词的超大文本文件，给定任意两个不同的单词，找出在这个文件中这两个单词的最短距离(相隔单词数)。如果寻找过程在这个文件中会重复多次，而每次寻找的单词不同，你能对此优化吗?
 */

class Solution
{

    /**
     * @param String[] $words
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function findClosest($words, $word1, $word2)
    {
        $len = count($words);
        $res = $len;
        $x = $y = -1;
        for ($i = 0; $i < $len; $i++) {
            if ($words[$i] == $word1) {
                $x = $i;
            }
            if ($words[$i] == $word2) {
                $y = $i;
            }
            if ($x >= 0 && $y >= 0) {
                $res = min($res, abs($x - $y));
            }
        }
        return $res;
    }
}

/**
 * 执行用时：156 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：37.4 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：43 / 43
 */