<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 10:23
 * Des: 6079. 价格减免
 *      https://leetcode.cn/problems/apply-discount-to-prices/
 *      句子 是由若干个单词组成的字符串，单词之间用单个空格分隔，其中每个单词可以包含数字、小写字母、和美元符号 '$' 。如果单词的形式为美元符号后跟着一个非负实数，那么这个单词就表示一个价格。
 *      例如 "$100"、"$23" 和 "$6.75" 表示价格，而 "100"、"$" 和 "2$3" 不是。
 *      注意：本题输入中的价格均为整数。
 *      给你一个字符串 sentence  和一个整数 discount 。对于每个表示价格的单词，都在价格的基础上减免 discount% ，并 更新 该单词到句子中。所有更新后的价格应该表示为一个 恰好保留小数点后两位 的数字。
 *      返回表示修改后句子的字符串。
 */

class Solution
{

    /**
     * @param String $sentence
     * @param Integer $discount
     * @return String
     */
    function discountPrices($sentence, $discount)
    {
        $discount = $discount / 100;
        $sentence = explode(' ', $sentence);
        $res = [];
        foreach ($sentence as $item) {
            $flag = true;
            for ($i = 0; $i < strlen($item); $i++) {
                if ($i == 0 && $item[$i] !== '$') {
                    $flag = false;
                    break;
                }
                if ($i != 0 && ($item[$i] != '.' && !is_numeric($item[$i]))) {
                    $flag = false;
                    break;
                }
            }
            if (strlen($item) < 2) {
                $flag = false;
            }
            if ($flag) {
                $item = str_replace('$', '', $item);
                $item = floatval($item);
                $item = sprintf("%.2f", $item - $item * $discount);
                $item = '$' . $item;

            }
            $res[] = $item;

        }
        return implode(' ', $res);
    }
}