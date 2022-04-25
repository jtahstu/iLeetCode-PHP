<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/17 11:04
 * Des: 819. 最常见的单词
 *      https://leetcode-cn.com/problems/most-common-word/
 *      给定一个段落 (paragraph) 和一个禁用单词列表 (banned)。返回出现次数最多，同时不在禁用列表中的单词。
 * 题目保证至少有一个词不在禁用列表中，而且答案唯一。
 * 禁用列表中的单词用小写字母表示，不含标点符号。段落中的单词不区分大小写。答案都是小写字母。
 */

class Solution
{

    /**
     * @param String $paragraph
     * @param String[] $banned
     * @return String
     */
    function mostCommonWord($paragraph, $banned)
    {
        $paragraph = preg_replace('/[^a-z]/', '-', strtolower($paragraph));
        $words = explode('-', $paragraph);
        $words = array_count_values(array_filter($words));
        arsort($words);
//        print_r($words);
        foreach ($words as $word => $count) {
            if (!in_array($word, $banned)) {
                return $word;
            }
        }
        return false;
    }
}

var_dump((new Solution())->mostCommonWord("Bob hit a ball,,x,,  the hit BALL flew far after it was hit.", ["hit"]));

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：47 / 47
 */