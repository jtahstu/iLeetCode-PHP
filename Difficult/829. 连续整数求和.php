<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/3 14:36
 * Des: 829. 连续整数求和
 *      https://leetcode.cn/problems/consecutive-numbers-sum/
 *      给定一个正整数 n，返回 连续正整数满足所有数字之和为 n 的组数 。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function consecutiveNumbersSum($n)
    {
        $count = 0;
        $n2 = $n * 2;
        for ($i = 1; $i * $i < $n2; $i++) {
            if ($n2 % $i == 0 && ($n2 / $i - ($i - 1)) % 2 == 0) {
                $count++;
            }
        }
        return $count;
    }
}

// 涉及到数论知识了, 咱推导不出来
//class Solution {
//    public int consecutiveNumbersSum(int n) {
//        int ans = 0; n *= 2;
//        for (int k = 1; k * k < n; k++) {
//            if (n % k != 0) continue;
//            if ((n / k - (k - 1)) % 2 == 0) ans++;
//        }
//      return ans;
//    }
//}
//作者：AC_OIer
//链接：https://leetcode.cn/problems/consecutive-numbers-sum/solution/by-ac_oier-220q/