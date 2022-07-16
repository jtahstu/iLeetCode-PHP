<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/27 15:46
 * Desc: 522. 最长特殊序列 II
 *      https://leetcode.cn/problems/longest-uncommon-subsequence-ii/
 *      给定字符串列表 strs ，返回其中 最长的特殊序列 。如果最长特殊序列不存在，返回 -1 。
 *      特殊序列 定义如下：该序列为某字符串 独有的子序列（即不能是其他字符串的子序列）。
 *       s 的 子序列可以通过删去字符串 s 中的某些字符实现。
 *      例如，"abc" 是 "aebdc" 的子序列，因为您可以删除"aebdc"中的下划线字符来得到 "abc" 。"aebdc"的子序列还包括"aebdc"、 "aeb" 和 "" (空字符串)
 */

class Solution
{

    /**
     * @param String[] $strs
     * @return Integer
     */
    function findLUSlength($strs)
    {
        $count = count($strs);
        $res = -1;
        for ($i = 0; $i < $count; $i++) {
            if (strlen($strs[$i]) <= $res) continue;
            $ok = true;
            for ($j = 0; $j < $count; $j++) {
                if ($i == $j) continue;
                $v = $this->lcs($strs[$i], $strs[$j]);  //判断i是不是j的子集
                if($v) {
                    $ok = false;
                    break;
                }
            }
            if ($ok) $res = strlen($strs[$i]);  //如果i和所有的其它字符串都不是子集, 那么i的长度就是最长特殊序列
        }
        return $res;
    }


    function lcs($str1, $str2)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);
        if ($len1 > $len2) return false;
        for ($i = -1; $i < $len1; $i++) {
            for ($j = -1; $j < $len2; $j++) {
                $dp[$i][$j] = 0;
            }
        }

        for ($i = 0; $i < $len1; $i++) {
            for ($j = 0; $j < $len2; $j++) {
                if ($str1[$i] == $str2[$j]) $dp[$i][$j] = max($dp[$i][$j], $dp[$i - 1][$j - 1] + 1);
                else $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
        return $dp[$len1 - 1][$len2 - 1] == $len1;
    }
}


var_dump((new Solution())->findLUSlength(["aaac", "aaa", "aa"]));

/**
 * 基于lcs判断str_i是否是str_j的子序列, 如果str_i不是其它字符串的子集, 那么str_i的长度就是最长的特殊序列
 * 最大公共子串(Longest Common Substring,LCS)算法参考: https://www.cnblogs.com/powerkeke/p/12795553.html
 *
 * 执行用时：40 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：98 / 98
 */