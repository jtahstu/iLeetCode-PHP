<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 10:23
 * Des: 6078. 重排字符形成目标字符串
 *      https://leetcode.cn/problems/rearrange-characters-to-make-target-string/
 *      给你两个下标从 0 开始的字符串 s 和 target 。你可以从 s 取出一些字符并将其重排，得到若干新的字符串。
 *      从 s 中取出字符并重新排列，返回可以形成 target 的 最大 副本数。
 */

class Solution
{

    /**
     * @param String $s
     * @param String $target
     * @return Integer
     */
    function rearrangeCharacters($s, $target)
    {
        $list = [];
        $list2 = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $list[$s[$i]] = isset($list[$s[$i]]) ? $list[$s[$i]] + 1 : 1;
        }
        print_r($list);
        for ($i = 0; $i < strlen($target); $i++) {
            $list2[$target[$i]] = isset($list2[$target[$i]]) ? $list2[$target[$i]] + 1 : 1;
        }
        print_r($list2);
        $count = 0;
        foreach($list2 as $key => $value) {
            if (!isset($list[$key])) {
                $count = 0;
                break;
            } else {
                $count = min($count, intval($list[$key] / $value));
            }
        }

        return $count;
    }
}