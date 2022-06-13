<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/12 9:47
 * Des: 890. 查找和替换模式
 *      https://leetcode.cn/problems/find-and-replace-pattern/
 *      你有一个单词列表 words 和一个模式  pattern，你想知道 words 中的哪些单词与模式匹配。
 *      如果存在字母的排列 p ，使得将模式中的每个字母 x 替换为 p(x) 之后，我们就得到了所需的单词，那么单词与模式是匹配的。
 *      （回想一下，字母的排列是从字母到字母的双射：每个字母映射到另一个字母，没有两个字母映射到同一个字母。）
 *      返回 words 中与给定模式匹配的单词列表。
 *      你可以按任何顺序返回答案。
 */

class Solution
{

    /**
     * @param String[] $words
     * @param String $pattern
     * @return String[]
     */
    function findAndReplacePattern($words, $pattern)
    {
        $pattern_len = strlen($pattern);
        $hash = $this->getHash($pattern);
        $hash_count = count($hash);

        $res = [];
        foreach ($words as $word) {
            if (strlen($word) != $pattern_len) continue;
            $hash_word = $this->getHash($word);
            if (count($hash_word) != $hash_count) continue;
            $flag = true;
            $w_hash = [];
            for ($i = 0; $i < $pattern_len; $i++) {
                if ($hash_word[$word[$i]] != $hash[$pattern[$i]]) {
                    $flag = false;
                    break;
                }
                if (isset($w_hash[$word[$i]]) && $w_hash[$word[$i]] != $pattern[$i]) {
                    $flag = false;
                    break;
                }
                $w_hash[$word[$i]] = $pattern[$i];
            }
            if ($flag) $res[] = $word;
        }
        return $res;
    }


    function getHash($word)
    {
        $hash = [];
        for ($i = 0; $i < strlen($word); $i++) {
            $hash[$word[$i]] = isset($hash[$word[$i]]) ? $hash[$word[$i]] + 1 : 1;
        }
        return $hash;
    }
}

/**
 * 首先检查各个字母出现的数量, 然后看word和pattern是否都是字母一一对应
 *
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：47 / 47
 */