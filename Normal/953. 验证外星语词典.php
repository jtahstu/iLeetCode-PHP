<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/17 0:31
 * Des: 953. 验证外星语词典
 *      https://leetcode.cn/problems/verifying-an-alien-dictionary/
 */

class Solution
{

    /**
     * @param String[] $words
     * @param String $order
     * @return Boolean
     */
    function isAlienSorted($words, $order)
    {
        if (count($words) == 1) return true;
        $order_list = [];
        $len = strlen($order);
        for ($i = 0; $i < $len; $i++) {
            $order_list[$order[$i]] = $i;
        }
        for ($i = 1; $i < count($words); $i++) {
//            var_dump([$words[$i], $words[$i - 1], $this->isLess($words[$i], $words[$i - 1], $order_list)]);
            if (!$this->isLess($words[$i - 1], $words[$i], $order_list)) {
                return false;
            }
        }
        return true;
    }

    function isLess($a, $b, &$order_list)
    {
        for ($i = 0; $i < strlen($a); $i++) {
            if ($a[$i] == $b[$i]) continue;
            if (!isset($b[$i])) return false;
            if ($order_list[$a[$i]] > $order_list[$b[$i]]) return false;
            else return true;
        }
        return true;
    }
}

var_dump((new Solution)->isAlienSorted(["hello", "leetcode"], "hlabcdefgijkmnopqrstuvwxyz"));  //1
var_dump((new Solution)->isAlienSorted(["word", "world", "row"], "worldabcefghijkmnpqstuvxyz"));  //0
var_dump((new Solution)->isAlienSorted(["apple", "app"], "abcdefghijklmnopqrstuvwxyz"));  //0
var_dump((new Solution)->isAlienSorted(["my", "f"], "gelyriwxzdupkjctbfnqmsavho"));  //0
var_dump((new Solution)->isAlienSorted(["hello", "hello"], "abcdefghijklmnopqrstuvwxyz"));  //1

/**
 * 果然是外星语, 单词都这么恶心人
 * 执行用时：4 ms, 在所有 PHP 提交中击败了75.00%的用户
 * 内存消耗：19.2 MB, 在所有 PHP 提交中击败了25.00%的用户
 * 通过测试用例：120 / 120
 */