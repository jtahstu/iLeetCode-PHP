<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/7 0:36
 * Des: 433. 最小基因变化
 *      https://leetcode.cn/problems/minimum-genetic-mutation/
 */

class Solution
{
    public static $list = ['A', 'C', 'G', 'T'];

    /**
     * @param String $start
     * @param String $end
     * @param String[] $bank
     * @return
     */
    function minMutation($start, $end, $bank)
    {
        if ($start == $end) {
            return 0;
        }
        $bank = array_unique($bank);
        if (!in_array($end, $bank)) {
            return -1;
        }
        $res[$start] = 0;
        $wds = [$start];
        while ($wds) {
            $wd = array_shift($wds);
            for ($i = 0; $i < strlen($wd); $i++) {
                $wd_new = $wd;
                for ($j = 0; $j < 4; $j++) {
                    if ($wd_new[$i] == self::$list[$j]) {
                        continue;
                    }
                    $wd_new[$i] = self::$list[$j];
                    if (in_array($wd_new, $bank) && !isset($res[$wd_new])) {
                        $res[$wd_new] = $res[$wd] + 1;
                        if ($wd_new == $end) {
//                            print_r($res);
                            return $res[$wd_new];
                        }
                        array_push($wds, $wd_new);
                    }
                }
            }
        }
        return -1;
    }
}

var_dump((new Solution)->minMutation("AACCGGTT", "AAACGGTA", ["AACCGGTA", "AACCGCTA", "AAACGGTA"]));
var_dump((new Solution)->minMutation("AAAAACCC", "AACCCCCC", ["AAAACCCC", "AAACCCCC", "AACCCCCC"]));

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.4 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：14 / 14
 */