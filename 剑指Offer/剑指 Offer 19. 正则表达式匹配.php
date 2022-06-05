<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 19:46
 * Des: 10. 正则表达式匹配
 *      https://leetcode.cn/problems/regular-expression-matching/
 *      剑指 Offer 19. 正则表达式匹配
 *      https://leetcode.cn/problems/zheng-ze-biao-da-shi-pi-pei-lcof/
 *      给你一个字符串 s 和一个字符规律 p，请你来实现一个支持 '.' 和 '*' 的正则表达式匹配。
 *          '.' 匹配任意单个字符
 *          '*' 匹配零个或多个前面的那一个元素
 *      所谓匹配，是要涵盖 整个 字符串 s的，而不是部分字符串。
 */

class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        $s_len = strlen($s);
        $p_len = strlen($p);
        if ($p_len == 0) return $s_len == 0;
        $dp[0][0] = true;
        for ($i = 1; $i <= $p_len; $i++) {
            $dp[0][$i] = $p[$i - 1] == '*' ? $dp[0][$i - 2] : false;
        }
        for ($i = 1; $i <= $s_len; $i++) {
            for ($j = 1; $j <= $p_len; $j++) {
                if ($s[$i - 1] == $p[$j - 1] || $p[$j - 1] == '.') {  //同位置相同或者p是点, 那就是上一个的状态
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                }
                if ($p[$j - 1] == '*') {
                    if ($s[$i - 1] == $p[$j - 2] || $p[$j - 2] == '.') {  //和上一个相同或者上一个位置是点
                        $dp[$i][$j] = $dp[$i][$j - 2] || $dp[$i - 1][$j];
                    } else {
                        $dp[$i][$j] = $dp[$i][$j - 2];
                    }
                }
            }
        }
        // var_dump($dp);
        return $dp[$s_len][$p_len] ?? false;
    }
}

/**
 * 动态规划法，`dp[i][j]` 表示 s 的前 i 项和 p 的前 j 项是否匹配。
 *
 * 现在如果已知了 `dp[i-1][j-1]` 的状态，我们该如何确定 `dp[i][j]` 的状态呢？我们可以分三种情况讨论，其中，前两种情况考虑了所有能匹配的情况，剩下的就是不能匹配的情况了：
 *
 * 1. `s[i] == p[j]` or `p[j] == '.'`：比如 ab**b** 和 ab**b**，或者 ab**b** 和 ab. ，很容易得到 `dp[i][j]` = `dp[i-1][j-1]` = True。因为 ab 和 ab 是匹配的，如果后面分别加一个 b，或者 s 加一个 b 而 p 加一个 `.` ，仍然是匹配的。
 * 2. `p[j] == '*'`：当 `p[j] == '*'` 时，由于 `*` 与前面的字符相关，因此我们比较 `*` 前面的字符 `p[j-1]` 和 `s[i]` 的关系。根据 `*` 前面的字符与 s[i] 是否相等，又可分为以下两种情况：
 *  - `p[j-1] != s[i]`：如果 `*` 前一个字符匹配不上，`*` 匹配了 0 次，应忽略这两个字符，看 `p[j-2]` 和 `s[i]` 是否匹配。 这时 `dp[i][j] = dp[i][j-2]`。
 *  - `p[j-1] == s[i]` or `p[j-1] == '.'`：`*` 前面的字符可以与 s[i] 匹配，这种情况下，`*` 可能匹配了前面的字符的 0 个，也可能匹配了前面字符的多个，当匹配 0 个时，如 `ab` 和 `abb*`，或者 `ab` 和 `ab.*` ，这时我们需要去掉 p 中的 `b*` 或 `.*` 后进行比较，即 `dp[i][j] = dp[i][j-2]`；当匹配多个时，如 `abbb` 和 `ab*`，或者 `abbb` 和 `a.*`，我们需要将 s[i] 前面的与 p 重新比较，即 `dp[i][j] = dp[i-1][j]`。
 * 3. 其他情况：以上两种情况把能匹配的都考虑全面了，所以其他情况为不匹配，即 `dp[i][j] = False`。
 *
 * 执行用时：16 ms, 在所有 PHP 提交中击败了49.23%的用户
 * 内存消耗：19.1 MB, 在所有 PHP 提交中击败了24.61%的用户
 * 通过测试用例：353 / 353
 */