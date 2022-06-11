<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 23:24
 * Des: 6098. 统计得分小于 K 的子数组数目
 *      https://leetcode.cn/problems/count-subarrays-with-score-less-than-k/
 *      一个数字的 分数 定义为数组之和 乘以 数组的长度。
 *          比方说，[1, 2, 3, 4, 5] 的分数为 (1 + 2 + 3 + 4 + 5) * 5 = 75 。
 *      给你一个正整数数组 nums 和一个整数 k ，请你返回 nums 中分数 严格小于 k 的 非空整数子数组数目。
 *      子数组 是数组中的一个连续元素序列。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countSubarrays($nums, $k)
    {
        $n = count($nums);
        $sum[-1] = 0;
        for ($i = 0; $i < $n; $i++) {
            $sum[$i] = $sum[$i - 1] + $nums[$i];
        }
//        print_r($sum);
        $res = 0;
        $i = 0;
        while ($i < $n) {
            $l = $i;
            $r = $n;
            while ($l < $r) {
                $mid = $l + (($r - $l) >> 1);
                if (($sum[$mid] - $sum[$i - 1]) * ($mid - $i + 1) >= $k) {
                    $r = $mid;
                } else {
                    $l = $mid + 1;
                }
            }
//            print_r([$l, $i]);
            $res += $l - $i;
            $i++;
        }
        return $res;
    }
}

var_dump((new Solution)->countSubarrays([2, 1, 4, 3, 5], 10));
var_dump((new Solution)->countSubarrays([1, 1, 1], 5));

//暴力可以过
//二分查快一些, 基本就是这个思路

//这个暴力的思路比较简洁, 建议还是这种写法, 害, 比赛的时候脑子瓦特了, 竟然没调出来
//class Solution {
//public:
//    long long countSubarrays(vector<int>& nums, long long k) {
//        int n = nums.size();
//        vector<long long> sm(n + 1);
//        for (int i = 1; i <= n; i++) sm[i] = sm[i - 1] + nums[i - 1];
//
//        long long ans = 0;
//        for (int i = 1, j = 1; i <= n; i++) {
//            while (j <= i && (sm[i] - sm[j - 1]) * (i - j + 1) >= k) j++;
//            ans += i - j + 1;
//        }
//        return ans;
//    }
//};
//
//作者：TsReaper
//链接：https://leetcode.cn/circle/discuss/zEDpCN/view/Wo2E5A/
//来源：力扣（LeetCode）
//著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。