<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/7 14:33
 * Desc: 648. 单词替换
 *      https://leetcode.cn/problems/replace-words/
 *      在英语中，我们有一个叫做 词根(root) 的概念，可以词根后面添加其他一些词组成另一个较长的单词——我们称这个词为 继承词(successor)。例如，词根an，跟随着单词 other(其他)，可以形成新的单词 another(另一个)。
 *      现在，给定一个由许多词根组成的词典 dictionary 和一个用空格分隔单词形成的句子 sentence。你需要将句子中的所有继承词用词根替换掉。如果继承词有许多可以形成它的词根，则用最短的词根替换它。
 *      你需要输出替换之后的句子。
 */

class TrieNode
{
    public $data;
    // 存储子串
    public $children = [];
    // 是否为某个单词的结束节点
    public $isWord = false;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Solution
{

    public $root = NULL;

    function buildTrieTree($dictionary)
    {
        $this->root = new TrieNode('ROOT');
        foreach ($dictionary as $dict) {
            $headNode = $this->root;
            $len = strlen($dict);
            for ($i = 0; $i < $len; $i++) {
                //统一小写处理
                //索引采用ASCII码
                $index = strtolower(ord($dict[$i]));
                $data = strtolower($dict[$i]);

                if (empty($headNode->children[$index])) {
                    $newNode = new TrieNode($data);
                    $headNode->children[$index] = $newNode;
                }
                $headNode = $headNode->children[$index];
            }
            $headNode->isWord = true;
        }
        //        print_r($this->root);
    }

    public function search($str)
    {
        $headNode = $this->root;
        $strLen = strlen($str);
        for ($i = 0; $i < $strLen; $i++) {
            $index = strtolower(ord($str[$i]));
            $data = strtolower($str[$i]);
            if (empty($headNode->children[$index])) {
                return false;
            }
            $headNode = $headNode->children[$index];
            if ($headNode->isWord) {
                return substr($str, 0, $i + 1);
            }
        }
        return false;
    }


    /**
     * @param String[] $dictionary
     * @param String   $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence)
    {
        $this->buildTrieTree($dictionary);
        $words = explode(' ', $sentence);
        foreach ($words as $k => $word) {
            $str_prefix = $this->search($word);
            if ($str_prefix) {
                $words[$k] = $str_prefix;
            }
        }
        return implode(' ', $words);
    }
}


var_dump((new Solution)->replaceWords(["cat", "caa", "bat", 'bag', "rat"], "the cattle was rattled by the battery"));
var_dump((new Solution)->replaceWords(["a", "b", "c"], "aadsfasf absbs bbab cadsfafs"));


/**
 * 字典树, 找前缀, 第一次刷到, 学习一下
 * 参考 https://diffnest.github.io/2019/09/22/%E6%9C%AD%E8%AE%B0%E4%B9%8BPHP%E5%AE%9E%E7%8E%B0%E5%AD%97%E5%85%B8%E6%A0%91-Trie/
 *
 * 执行用时：36 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：44.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：126 / 126
 */