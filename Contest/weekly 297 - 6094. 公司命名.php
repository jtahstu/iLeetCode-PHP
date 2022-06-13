<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/12 11:41
 * Des: 6094. 公司命名
 *      https://leetcode.cn/problems/naming-a-company/
 *      给你一个字符串数组 ideas 表示在公司命名过程中使用的名字列表。公司命名流程如下：
 *          从 ideas 中选择 2 个 不同 名字，称为 ideaA 和 ideaB 。
 *          交换 ideaA 和 ideaB 的首字母。
 *          如果得到的两个新名字 都 不在 ideas 中，那么 ideaA ideaB（串联 ideaA 和 ideaB ，中间用一个空格分隔）是一个有效的公司名字。
 *          否则，不是一个有效的名字。
 *      返回 不同 且有效的公司名字的数目。
 */

class Solution
{

    /**
     * @param String[] $ideas
     * @return Integer
     */
    function distinctNames($ideas)
    {
        $n = count($ideas);
        $items = $list = [];
        foreach ($ideas as $idea) {
            $len = strlen($idea);
            $sub = substr($idea, 1, $len - 1);
            $items[$idea[0]][] = $idea;
            $list[$sub][] = $idea[0];
        }
//        print_r([$items, $list]);
        $cnt = 0;
        for ($i = 0; $i < $n; $i++) {
            $idea = $ideas[$i];
            $len = strlen($idea);
            $sub = substr($idea, 1, $len - 1);
            $c = $n;
            foreach ($list[$sub] as $ch) {
                $c -= isset($items[$ch]) ? count($items[$ch]) : 0;
            }
//            if (count($list[$sub]) == 1) $c--;
            $cnt += $c;
            if($i==2) var_dump($cnt);
        }
        return $cnt;
    }
}

var_dump((new Solution)->distinctNames(["coffee", "donuts", "time", "toffee"]));

//这题有思路, 就是去掉同类别的, 一批一批加起来就行, 也差点点吧, 可惜