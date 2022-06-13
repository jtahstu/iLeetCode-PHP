<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/13 22:30
 * Des: 383. 赎金信
 *      https://leetcode.cn/problems/ransom-note/
 *      给你两个字符串：ransomNote 和 magazine ，判断 ransomNote 能不能由 magazine 里面的字符构成。
 *      如果可以，返回 true ；否则返回 false 。
 *      magazine 中的每个字符只能在 ransomNote 中使用一次。
 */

class Solution
{

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine)
    {
        $hash_r = $hash_m = [];
        for ($i = 0; $i < strlen($magazine); $i++) {
            $hash_m[$magazine[$i]] = isset($hash_m[$magazine[$i]]) ? $hash_m[$magazine[$i]] + 1 : 1;
        }
        for ($i = 0; $i < strlen($ransomNote); $i++) {
            $hash_r[$ransomNote[$i]] = isset($hash_r[$ransomNote[$i]]) ? $hash_r[$ransomNote[$i]] + 1 : 1;
            if (!isset($hash_m[$ransomNote[$i]]) || $hash_m[$ransomNote[$i]] < $hash_r[$ransomNote[$i]]) return false;
        }
        return true;
    }
}

/**
 * 执行用时：24 ms, 在所有 PHP 提交中击败了46.60%的用户
 * 内存消耗：19.1 MB, 在所有 PHP 提交中击败了37.86%的用户
 * 通过测试用例：126 / 126
 */