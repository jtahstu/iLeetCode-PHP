<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/25 7:26
 * Des: 467. 环绕字符串中唯一的子字符串
 *      https://leetcode.cn/problems/unique-substrings-in-wraparound-string/
 */

class Solution
{

    /**
     * @param String $p
     * @return Integer
     */
    function findSubstringInWraproundString($p)
    {
        $n = strlen($p);
        $dp = [0, 1];
        $res = [];
        $pre = 0;
        for ($i = 0; $i < $n; $i++) {
            $t = ord($p[$i]) - ord('a');
            if ($i > 0 && ($pre + 1) % 26 == $t) {
                $dp[$i] = $dp[$i - 1] + 1;
            } else {
                $dp[$i] = 1;
            }
            $res[$t] = $res[$t] ? max($res[$t], $dp[$i]) : $dp[$i];
            $pre = $t;
        }
//        print_r($res);
        return array_sum($res);
    }


    function findSubstringInWraproundStringError($p)
    {
        $dp = [0, 1, 3, 6];
        for ($i = 4; $i < 100000; $i++) {
            $dp[$i] = $dp[$i - 1] + $i;
        }

        $n = strlen($p);
        $list = [$p[0]];
        $start = 0;
        for ($i = 1; $i < $n; $i++) {
            $t = ord($p[$i]) - ord('a');
            $pre = ord($p[$i - 1]) - ord('a');
//            echo "$t $pre\n";
            if ($t - 1 == $pre || ($t == 0 && $pre == 25)) {

            } else {
                $list[] = substr($p, $start, $i - $start);
                $start = $i;
            }
        }
        if ($start < $n) $list[] = substr($p, $start, $n - $start);

        //子字符串长度从大到小排序, 便于后面去重
        $list = array_unique($list);
        $sort_arr = [];
        foreach ($list as $str) {
            $sort_arr[] = strlen($str);
        }
        array_multisort($sort_arr, SORT_NUMERIC, SORT_DESC, $list);
        print_r($list);

        //去除是子串的情况
        $n = count($list);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if (!$list[$i] || !$list[$j]) {
                    continue;
                }
                if (strpos($list[$i], $list[$j]) !== false) {
                    unset($list[$j]);
                    continue;
                }
                if (strpos($list[$j], $list[$i]) !== false) {
                    unset($list[$i]);
                    continue;
                }
            }
        }
        $list = array_filter(array_values($list));
        print_r($list);
//        return;

        //计算2个子串的交集部分, 需要减掉
        $list_sub = [];
        $n = count($list);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $ins = array_intersect(str_split($list[$i]), str_split($list[$j]));
                if ($ins) {
                    $list_sub[] = $dp[count($ins)];
                }
            }
        }

        //所有子串能产生的子串数量 - 子串交集重复部分
        $ans = 0;
        foreach ($list as $str) {
            if (strlen($str) > 26) {
                $ans += $dp[strlen($str)] - $dp[strlen($str) - 26];
            } else {
                $ans += $dp[strlen($str)];
            }
        }
        print_r([$list, $list_sub]);
        return $ans - array_sum($list_sub);
    }
}

var_dump((new Solution)->findSubstringInWraproundString('zabc'));
var_dump((new Solution)->findSubstringInWraproundString('zabcabcd'));
//var_dump((new Solution)->findSubstringInWraproundString("sadbasbzxccbkshndasnbmxzczsxsabcasddefdefghjkjhggjgjghhg"));
//var_dump((new Solution)->findSubstringInWraproundString("abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyza"));
//var_dump((new Solution)->findSubstringInWraproundString("abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz"));
//var_dump((new Solution)->findSubstringInWraproundString("fghijklmnopqrstuvwkl bcdefghijklmnopqrstu opqrstuvwxyzuvwxyzghijklmnopqrklmpqrstuvklmnopqrstuvwxmn"));

/**
 * 执行用时：20 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.1 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：81 / 81
 */