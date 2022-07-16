<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/14 14:54
 * Desc: 745. 前缀和后缀搜索
 *      https://leetcode.cn/problems/prefix-and-suffix-search/
 *      设计一个包含一些单词的特殊词典，并能够通过前缀和后缀来检索单词。
 *      实现 WordFilter 类：
 *          WordFilter(string[] words) 使用词典中的单词 words 初始化对象。
 *          f(string pref, string suff) 返回词典中具有前缀 prefix 和后缀 suff 的单词的下标。如果存在不止一个满足要求的下标，返回其中 最大的下标 。如果不存在这样的单词，返回 -1 。
 */

class WordFilter
{
    public $trie;

    /**
     * @param String[] $words
     */
    function __construct($words)
    {
        $this->trie = new trieTree();
        foreach ($words as $k => $w) {
            $len = strlen($w);
            for ($n = $len - 1; $n >= 0; --$n)
                $this->trie->insert(substr($w, $n) . "#" . $w, $k);
        }
        //var_dump($this->trie);
    }

    /**
     * @param String $pref
     * @param String $suff
     * @return Integer
     */
    function f($pref, $suff)
    {
        $res = $this->trie->preCount($suff . "#" . $pref);
        return $res === false ? -1 : $res;
    }
}

class trieNode
{
    public $value = "";
    public $path = 0;
    public $end = false;
    public $map = [];

    public function __construct($value = '')
    {
        $this->value = $value;
    }
}

class trieTree
{
    public $root;

    public function __construct()
    {
        $this->root = new trieNode('');
    }

    public function insert(string $str, $index)
    {
        $len = strlen($str);
        $current = $this->root;
        for ($i = 0; $i < $len; $i++) {
            !isset($current->map[$str[$i]]) && $current->map[$str[$i]] = new trieNode($str[$i]);
            $current = $current->map[$str[$i]];
            $current->path = $index;
        }
        $current->end = $index;
    }

    public function delete(string $str)
    {
        $len = strlen($str);
        $current = $this->root;
        for ($i = 0; $i < $len; $i++) {
            $current = $current->map[$str[$i]];
            $current->path--;
        }
        $current->end--;
    }

    public function search(string $str)
    {
        $len = strlen($str);
        $current = $this->root;
        for ($i = 0; $i < $len; $i++) {
            if (!isset($current->map[$str[$i]]))
                return false;
            $current = $current->map[$str[$i]];
        }
        return $current->end;
    }

    public function preCount(string $pre)
    {
        $len = strlen($pre);
        $current = $this->root;
        if ($pre === '')
            return $current->end;
        for ($i = 0; $i < $len; $i++) {
            if (!isset($current->map[$pre[$i]]))
                return false;
            $current = $current->map[$pre[$i]];
        }
        return $current->path;
    }
}

/**
 * Take "apple" as an example, we will insert add "apple{apple", "pple{apple", "ple{apple", "le{apple", "e{apple", "{apple" into the Trie Tree.
 * If the query is: prefix = "app", suffix = "le", we can find it by querying our trie for "le { app".
 * We use '{' because in ASCii Table, '{' is next to 'z', so we just need to create new TrieNode[27] instead of 26. Also, compared with traditional Trie, we add the attribute weight in class TrieNode. You can still choose any different character.
 * 按提示来, 或者弄 2 颗树来分别记录前缀和后缀, 然后找最大的相同索引
 *
 * 执行用时：2396 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：242.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：17 / 17
 */


//暴力超时
class WordFilter2
{
    private $words = [];
    private $n = 0;
    private $ans_his = [];

    /**
     * @param String[] $words
     */
    function __construct($words)
    {
        $this->words = $words;
        $this->n = count($words);
    }

    /**
     * @param String $pref
     * @param String $suff
     * @return Integer
     */
    function f($pref, $suff)
    {
        if (isset($this->ans_his[$pref . $suff])) {
            return $this->ans_his[$pref . $suff];
        }
        for ($i = $this->n - 1; $i >= 0; $i--) {
            $l = strlen($this->words[$i]);
            if ($this->words[$i][0] != $pref[0])
                continue;
            if ($this->words[$i][$l - 1] != $suff[strlen($suff) - 1])
                continue;
            if (strpos($this->words[$i], $pref) === 0 && strpos($this->words[$i], $suff) == $l - strlen($suff)) {
                $this->ans_his[$pref . $suff] = $i;
                return $i;
            }
        }
        return -1;
    }
}

/**
 * Your WordFilter object will be instantiated and called as such:
 * $obj = WordFilter($words);
 * $ret_1 = $obj->f($pref, $suff);
 */