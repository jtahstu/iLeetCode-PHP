<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 22:19
 * Des: 6084. 最多单词数的发件人
 *      https://leetcode.cn/contest/biweekly-contest-79/problems/sender-with-largest-word-count/
 */

class Solution
{

    /**
     * @param String[] $messages
     * @param String[] $senders
     * @return String
     */
    function largestWordCount($messages, $senders)
    {
        $n = count($messages);
        $list = [];
        for ($i = 0; $i < $n; $i++) {
            $list[$senders[$i]] = isset($list[$senders[$i]]) ? $list[$senders[$i]] + count(explode(' ', $messages[$i])) : count(explode(' ', $messages[$i]));
        }
        arsort($list);
        // print_r($list);
        $max = -1;
        $users = [];
        foreach ($list as $user => $words) {
            if ($words >= $max) {
                $max = $words;
                $users[] = $user;
            }
        }
        sort($users);
        return end($users);
    }
}

//正常速度