<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/23 14:05
 * Desc: 30. 串联所有单词的子串
 *      https://leetcode.cn/problems/substring-with-concatenation-of-all-words/
 *      给定一个字符串 s 和一些 长度相同 的单词 words 。找出 s 中恰好可以由 words 中所有单词串联形成的子串的起始位置。
 *      注意子串要与 words 中的单词完全匹配，中间不能有其他字符 ，但不需要考虑 words 中单词串联的顺序。
 */

class Solution
{

    /**
     * @param String   $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words)
    {
        sort($words);
        $len = strlen($words[0]);
        $count = count($words);
        $s_len = strlen($s);
        $hash_words = $this->getHash(implode('', $words));
//        echo json_encode($hash_words) . PHP_EOL;
        $l = 0;
        $hash = $res = [];
        while ($l <= $s_len - $len * $count) {
            $r = $l + $len * $count - 1;
            if ($l == 0) {
                $hash = $this->getHash(substr($s, $l, $len * $count));
            } else {
                $hash[$s[$l - 1]]--;
                if ($hash[$s[$l - 1]] == 0) unset($hash[$s[$l - 1]]);
                $hash[$s[$r]] = isset($hash[$s[$r]]) ? $hash[$s[$r]] + 1 : 1;
            }
//            echo $l . ": " . json_encode($hash) . PHP_EOL;
            if ($this->checkHash($hash_words, $hash)) {
                $substr = substr($s, $l, $len * $count);
                $substr = str_split($substr, $len);
                sort($substr);
                if($words === $substr) $res[] = $l;
            }
            $l++;
        }
        return $res;
    }


    function getHash($str)
    {
        $hash = [];
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $hash[$str[$i]] = isset($hash[$str[$i]]) ? $hash[$str[$i]] + 1 : 1;
        }
        return $hash;
    }

    function checkHash($hash1, $hash2)
    {
        if (count($hash1) != count($hash2)) return false;
        foreach (array_keys($hash1) as $key) {
            if (!isset($hash2[$key]) || $hash2[$key] != $hash1[$key]) {
                return false;
            }
        }
        return true;
    }
}

print_r((new Solution)->findSubstring("barfoothefoobarman", ["foo", "bar"]));
print_r((new Solution)->findSubstring("wordgoodgoodgoodbestword", ["word", "good", "best", "word"]));
print_r((new Solution)->findSubstring("barfoofoobarthefoobarman", ["bar", "foo", "the"]));
print_r((new Solution)->findSubstring("wordgoodgoodgoodbestword", ["word","good","best","good"]));  //131 / 177    8
print_r((new Solution)->findSubstring("abaababbaba", ["ab","ba","ab","ba"]));  //175/177    1,3

/**
 * 思路倒是比较简单, 先利用hash快速判断子串是否可以用$words组成, 然后比较即可, 为了不重复计算hash, 要滑动一下
 * 瞅了瞅别人的写法, hash这里可以不统计每个字符, 直接统计words中的字符串就行
 *
 * 执行用时：148 ms, 在所有 PHP 提交中击败了60.00%的用户
 * 内存消耗：19.8 MB, 在所有 PHP 提交中击败了8.00%的用户
 * 通过测试用例：177 / 177
 */