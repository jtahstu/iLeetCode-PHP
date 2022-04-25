<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/19 0:11
 * Des: 821. 字符的最短距离
 *      https://leetcode-cn.com/problems/shortest-distance-to-a-character/
 *      给你一个字符串 s 和一个字符 c ，且 c 是 s 中出现过的字符。
 * 返回一个整数数组 answer ，其中 answer.length == s.length 且 answer[i] 是 s 中从下标 i 到离它 最近 的字符 c 的 距离 。
 * 两个下标 i 和 j 之间的 距离 为 abs(i - j) ，其中 abs 是绝对值函数。
 */

class Solution
{

    /**
     * @param String $s
     * @param String $c
     * @return Integer[]
     * 正常就是全部遍历拿举例取最小值
     */
    function shortestToChar($s, $c)
    {
        $index_c_arr = [];
        $res = [];
        $s_len = strlen($s);
        for ($i = 0; $i < $s_len; $i++) {
            if ($s[$i] == $c) {
                $index_c_arr[] = $i;
                $res[$i] = 0;
            } else {
                $res[$i] = $s_len;
            }

        }
        foreach ($index_c_arr as $index_c) {
            foreach ($res as $index => $l) {
                if ($l == 0) {
                    continue;
                }
                $this_index = abs($index_c - $index);
                $res[$index] = $this_index < $res[$index] ? $this_index : $res[$index];
            }
        }
        return array_values($res);
    }


    /*
     * 剪枝就是不重复计算一些已经可以确定的最小举例,较少不必要的计算量
     * 速度明显快了, 增速57%
     */
    function shortestToChar剪枝($s, $c)
    {
        $index_c_arr = [];
        $res = [];
        $s_len = strlen($s);
        for ($i = 0; $i < $s_len; $i++) {
            if ($s[$i] == $c) {
                $index_c_arr[] = $i;
                $res[$i] = 0;
            } else {
                $res[$i] = $s_len;
            }

        }
        foreach ($index_c_arr as $k => $index_c) {
            //获取当前index_c能控制的范围区间, 两边的不受当前index_c控制
            $min_i = isset($index_c_arr[$k - 1]) ? min($index_c_arr[$k - 1] + 2, $index_c - 1) : 0;
            $max_i = isset($index_c_arr[$k + 1]) ? max($index_c_arr[$k + 1] - 2, $index_c + 1) : $s_len - 1;
//            echo "$min_i $max_i\n";
            if ($min_i > $max_i) {
                continue;
            }
            for ($j = $min_i; $j <= $max_i; $j++) {
                if ($res[$j] == 0) {
                    continue;
                }
                $this_index = abs($index_c - $j);
                $res[$j] = $this_index < $res[$j] ? $this_index : $res[$j];
            }
        }
        return array_values($res);
    }
}


//print_r((new Solution())->shortestToChar('loveleetcode', 'e'));
print_r((new Solution())->shortestToChar剪枝('loveleetcode', 'e'));

/*
 * 执行用时：28 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了75.00%的用户
 * 通过测试用例：76 / 76
 *
 * 执行用时：12 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：76 / 76
 */

/*
 * 这个方法也不错, 求出每个位置举例2边的各自距离, 然后取左右距离的较小值
 * class Solution {
   public:
    vector<int> shortestToChar(string s, char c) {
        int n = s.size();
        vector<int> res;
        vector<int> l(n), r(n);
        l[0] = INT_MAX, r[n - 1] = INT_MAX;
        for(int i = 0; i < n; i ++)
        {
            if(s[i] == c) l[i] = i;
            else if(i) l[i] = l[i - 1];
        }

        for(int i = n - 1; i >= 0; i --)
        {
            if(s[i] == c) r[i] = i;
            else if(i != n - 1) r[i] = r[i + 1];
        }

        for(int i = 0; i < n; i ++) res.push_back(min(abs(i - l[i]), abs(i - r[i])));

        return res;
    }
};
 */