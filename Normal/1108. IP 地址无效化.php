<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/21 13:44
 * Desc: 1108. IP 地址无效化
 *      https://leetcode.cn/problems/defanging-an-ip-address/
 *      给你一个有效的 IPv4 地址 address，返回这个 IP 地址的无效化版本。
 *      所谓无效化 IP 地址，其实就是用 "[.]" 代替了每个 "."。
 */

class Solution {

    /**
     * @param String $address
     * @return String
     */
    function defangIPaddr($address) {
        return str_replace('.', '[.]', $address);
    }
}

/**
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了17.65%的用户
 * 通过测试用例：62 / 62
 */