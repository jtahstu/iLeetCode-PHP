<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 10:07
 * Des: todo list
 */

class Solution
{

    /**
     * @param String[] $words
     * @return String[]
     */
    function removeAnagrams($words)
    {
        $items = $words;
        $pre_str = '';
        for ($i = 0; $i < count($words); $i++) {
            $wd = str_split($words[$i]);
            sort($wd);
            $wd_str = implode('', $wd);
//            print_r([$pre_str, $wd_str]);
            if ($wd_str == $pre_str) {
                unset($items[$i]);
            }
            $pre_str = $wd_str;
        }
        return $items;
    }
}

var_dump((new Solution)->removeAnagrams(["abba","baba","bbaa","cd","cd"]));
//var_dump((new Solution)->removeAnagrams(["a","b","c","d","e"]));

//AC