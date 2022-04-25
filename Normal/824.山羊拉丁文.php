<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/21 0:12
 * Des: 824. 山羊拉丁文
 *      https://leetcode-cn.com/problems/goat-latin/
 *      给你一个由若干单词组成的句子 sentence ，单词间由空格分隔。每个单词仅由大写和小写英文字母组成。
 *      请你将句子转换为 “山羊拉丁文（Goat Latin）”（一种类似于 猪拉丁文- Pig Latin 的虚构语言）。山羊拉丁文的规则如下：
 *          如果单词以元音开头（'a', 'e', 'i', 'o', 'u'），在单词后添加"ma"。
 *              例如，单词 "apple" 变为 "applema" 。
 *          如果单词以辅音字母开头（即，非元音字母），移除第一个字符并将它放到末尾，之后再添加"ma"。
 *              例如，单词 "goat" 变为 "oatgma" 。
 *          根据单词在句子中的索引，在单词最后添加与索引相同数量的字母'a'，索引从 1 开始。
 *              例如，在第一个单词后添加 "a" ，在第二个单词后添加 "aa" ，以此类推。
 *      返回将 sentence 转换为山羊拉丁文后的句子。
 */

class Solution
{

    /**
     * @param String $sentence
     * @return String
     */
    function toGoatLatin($sentence)
    {
        $res = '';
        $words = explode(' ', $sentence);
        foreach ($words as $k => $word) {
            if (!in_array(strtolower($word[0]), ['a', 'e', 'i', 'o', 'u'])) {
                $word = substr($word, 1, strlen($word) - 1) . $word[0];
            }
            $res .= $word . 'ma' . str_repeat('a', $k + 1) . ' ';
        }
        return rtrim($res);
    }
}

var_dump((new Solution())->toGoatLatin('I speak Goat Latin'));
var_dump((new Solution())->toGoatLatin('The quick brown fox jumped over the lazy dog'));

/*
 * 很简单, 没啥东西
 * 执行用时：8 ms, 在所有 PHP 提交中击败了75.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：99 / 99
 */