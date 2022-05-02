<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/3 00:05
 * Des: 937. 重新排列日志文件
 *      https://leetcode.cn/problems/reorder-data-in-log-files/
 */

class Solution
{

    /**
     * @param String[] $logs
     * @return String[]
     */
    function reorderLogFiles($logs)
    {
        $num_logs = [];
        $letter_logs = $letter_logs_sort1 = $letter_logs_sort2 = [];
        foreach ($logs as $log) {
            $arr = explode(' ', $log);
            $num_flag = true;
            for ($i = 1; $i < count($arr); $i++) {
                if (!is_numeric($arr[$i]))
                    $num_flag = false;
                break;
            }
            if ($num_flag) {
                $num_logs[] = $log;
            } else {
                $letter_logs[] = $log;
                $letter_logs_sort1[] = implode(' ', array_slice($arr, 1, count($arr) - 1));
                $letter_logs_sort2[] = $arr[0];
            }
        }
        if ($letter_logs) {
            array_multisort($letter_logs_sort1, SORT_STRING, SORT_ASC, $letter_logs_sort2, SORT_STRING, SORT_ASC, $letter_logs);
        }
        return array_merge($letter_logs, $num_logs);
    }
}

print_r((new Solution)->reorderLogFiles(["dig1 8 1 5 1", "let1 art can", "dig2 3 6", "let2 own kit dig", "let3 art zero"]));
print_r((new Solution)->reorderLogFiles(["a1 9 2 3 1", "g1 act car", "zo4 4 7", "ab1 off key dog", "a8 act zoo"]));

/**
 * 标签是简单题, 但感觉有些语言不太好写呀, 这多维排序还是好用的
 * 执行用时：12 ms, 在所有 PHP 提交中击败了66.67%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了66.67%的用户
 * 通过测试用例：65 / 65
 */