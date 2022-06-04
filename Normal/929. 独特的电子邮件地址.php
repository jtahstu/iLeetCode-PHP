<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/4 13:16
 * Des: 929. 独特的电子邮件地址
 *      https://leetcode.cn/problems/unique-email-addresses/
 *      按规则计算出实际的邮件地址, 然后返回去重后的数量
 */

class Solution
{

    /**
     * @param String[] $emails
     * @return Integer
     */
    function numUniqueEmails($emails)
    {
        $un_emails = [];
        foreach ($emails as $email) {
            list($name, $domain) = explode('@', $email);
            if ($i = strpos($name, '+')) {  //+号不会出现在0位置, 这里也就不管判断0了
                $name = substr($name, 0, $i);
            }
            $name = str_replace('.', '', $name);
            $un_emails[] = "{$name}@{$domain}";
        }
        // print_r($un_emails);
        return count(array_unique($un_emails));
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.2 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：185 / 185
 */