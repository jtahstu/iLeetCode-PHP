<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 22:28
 * Des: 6095. 强密码检验器 II
 *      https://leetcode.cn/problems/strong-password-checker-ii/
 *      如果一个密码满足以下所有条件，我们称它是一个 强 密码：
 *          它有至少 8 个字符。
 *          至少包含 一个小写英文 字母。
 *          至少包含 一个大写英文 字母。
 *          至少包含 一个数字 。
 *          至少包含 一个特殊字符 。特殊字符为："!@#$%^&*()-+" 中的一个。
 *          它 不 包含 2 个连续相同的字符（比方说 "aab" 不符合该条件，但是 "aba" 符合该条件）。
 *      给你一个字符串 password ，如果它是一个 强 密码，返回 true，否则返回 false 。
 */

class Solution
{

    /**
     * @param String $password
     * @return Boolean
     */
    function strongPasswordCheckerII($password)
    {
        $len = strlen($password);
        $l = $len >= 8;
        $x = $d = $s = $t = false;
        for ($i = 0; $i < $len; $i++) {
            if ($password[$i] >= 'a' && $password[$i] <= 'z') $x = true;
            if ($password[$i] >= 'A' && $password[$i] <= 'Z') $d = true;
            if (is_numeric($password[$i])) $s = true;
            if (strpos('!@#$%^&*()-+', $password[$i]) !== false) $t = true;
            if ($i > 0 && $password[$i] === $password[$i - 1]) return false;
        }
        // print_r([$l, $x, $d, $s, $t]);
        return $l && $x && $d && $s && $t;
    }
}

//"XrVIVr-L)CtyZ7xyo!TiHr859lCIHJ$CYHnCQ$kVafJ-15lKjkXLoW5zQnWa3jlGjH9+QKF&^Jvy1$WajBF9VL3^2Okns63LvMZX"