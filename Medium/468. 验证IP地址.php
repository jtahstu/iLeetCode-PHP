<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 15:11
 * Des: 468. 验证IP地址
 *      https://leetcode.cn/problems/validate-ip-address/
 *      给定一个字符串 queryIP。如果是有效的 IPv4 地址，返回 "IPv4" ；如果是有效的 IPv6 地址，返回 "IPv6" ；如果不是上述类型的 IP 地址，返回 "Neither" 。
 */

class Solution
{

    /**
     * @param String $queryIP
     * @return String
     */
    function validIPAddress($queryIP)
    {
//        哈哈, 力扣自创了IPv6规则, 服了, "2001:db8:85a3:0::8a2E:0370:7334"
//        if (filter_var($queryIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
//            return 'IPv4';
//        } elseif (filter_var($queryIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
//            return 'IPv6';
//        }
//        return 'Neither';


        if (substr_count($queryIP, '.') == 3) {
            $items = explode('.', $queryIP);
            foreach ($items as $item) {
//                echo $item . PHP_EOL;
                if (strlen($item) > 3 || $item == '' || ($item[0] == '0' && strlen($item) > 1)) return 'Neither';
                if (intval($item) < 0 || intval($item) > 255) return 'Neither';
                for ($i = 0; $i < strlen($item); $i++) {
                    if (!is_numeric($item[$i])) return 'Neither';
                }
            }
            return 'IPv4';
        }
        if (substr_count($queryIP, ':') == 7) {
            $items = explode(':', $queryIP);
            foreach ($items as $item) {
                if (strlen($item) > 4 || $item == '') return 'Neither';
                if (hexdec($item) < 0 || hexdec($item) > 65535) return 'Neither';
                for ($i = 0; $i < strlen($item); $i++) {
                    if (is_numeric($item[$i]) || in_array(strtolower($item[$i]), ['a', 'b', 'c', 'd', 'e', 'f'])) continue;
                    return 'Neither';
                }
            }
            return 'IPv6';
        }
        return 'Neither';


        //别人用的系统函数, 骚气, 就是要特判下双冒号
//        if (strpos($queryIP, ".")) {
//            return (filter_var($queryIP, FILTER_VALIDATE_IP)) ? 'IPv4' : 'Neither';
//        } elseif (strpos($queryIP, ":")) {
//            if (filter_var($queryIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
//                return (strpos($queryIP, '::')) ? 'Neither' : 'IPv6';
//            } else {
//                return 'Neither';
//            }
//        }
//        return "Neither";
    }
}

var_dump((new Solution)->validIPAddress("172.16.254.1"));
var_dump((new Solution)->validIPAddress("2001:0db8:85a3:0:0:8A2E:0370:7334"));
var_dump((new Solution)->validIPAddress("256.256.256.256"));
var_dump((new Solution)->validIPAddress("2001:0db8:85a3:0000:0000:8a2e:0370:7334"));
var_dump((new Solution)->validIPAddress("2001:0db8:85a3::8A2E:037j:7334"));
var_dump((new Solution)->validIPAddress("02001:0db8:85a3:0000:0000:8a2e:0370:7334"));
var_dump((new Solution)->validIPAddress("1e1.4.5.6"));
var_dump((new Solution)->validIPAddress("172.16.254.1"));