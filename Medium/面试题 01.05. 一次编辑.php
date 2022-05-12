<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/13 0:33
 * Des: 面试题 01.05. 一次编辑
 *      https://leetcode.cn/problems/one-away-lcci/
 *      字符串有三种编辑操作:插入一个字符、删除一个字符或者替换一个字符。 给定两个字符串，编写一个函数判定它们是否只需要一次(或者零次)编辑。
 */

class Solution
{

    /**
     * @param String $first
     * @param String $second
     * @return Boolean
     */
    function oneEditAway($first, $second)
    {
        $f_len = strlen($first);
        $s_len = strlen($second);
        if (abs($f_len - $s_len) > 1) return false;
        if ($first == $second) return true;
        if ($f_len > $s_len) {
            list($first, $second) = [$second, $first];
            list($f_len, $s_len) = [$s_len, $f_len];
        }
        if (!$first) return true;
        if ($s_len == $f_len + 1) { //插入或删除字符
            for ($i = 0; $i < $s_len; $i++) {
                $s = substr($second, 0, $i) . substr($second, $i + 1, $s_len - $i);
                echo $s . PHP_EOL;
                if ($s == $first) {
                    return true;
                }
            }
        } else { //替换字符
            for ($i = 0; $i < $s_len; $i++) {
                $s = $second;
                $s[$i] = $first[$i];
                if ($s == $first) {
                    return true;
                }
            }
        }
        return false;
    }
}

var_dump((new Solution)->oneEditAway("pale", "pal"));
var_dump((new Solution)->oneEditAway("pales", "pal"));
var_dump((new Solution)->oneEditAway("a", "b"));

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了80.65%的用户
 * 内存消耗：18.7 MB, 在所有 PHP 提交中击败了41.94%的用户
 * 通过测试用例：1146 / 1146
 */

//这个写法比较流弊, 都+1是替换, second+1是删除, first+1是插入
//class Solution:
//    def oneEditAway(self, first: str, second: str) -> bool:
//        m,n=len(first),len(second)
//        if abs(m-n)>1:
//            return False
//        for i in range(min(m,n)):
//            if first[i]!=second[i]:
//                return first[i+1:]==second[i+1:] or first[i:]==second[i+1:] or first[i+1:]==second[i:]
//        return True