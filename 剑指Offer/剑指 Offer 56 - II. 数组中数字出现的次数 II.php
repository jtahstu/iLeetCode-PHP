<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/27 14:59
 * Des: todo list
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums)
    {
        $list = [];
        foreach ($nums as $num) {
            $bin = decbin($num);
            $list[] = array_reverse(str_split($bin));
        }
        $res = [];
        foreach ($list as $item) {
            foreach ($item as $k => $v) {
                $res[$k] = ($res[$k] + $v) % 3;
            }
        }
        $ans = strrev(implode('', $res));
        return bindec($ans);
    }
}

var_dump((new Solution())->singleNumber([9,1,7,9,7,9,7,1,1,4]));

/**
 * 执行用时：260 ms, 在所有 PHP 提交中击败了12.50%的用户
 * 内存消耗：42.5 MB, 在所有 PHP 提交中击败了12.50%的用户
 * 通过测试用例：32 / 32
 */

//这个比较简洁
//class Solution {
//    public int singleNumber(int[] nums) {
//        int res = 0;
//        for (int i = 0; i < 32; i++) {
//            // 对于int每一位
//            int bit = 0;
//            // 计算该位上的和
//            for (int num : nums) {
//                bit += ((num >> i) & 1);
//            }
//            // 对3取余即为res在该位的值
//            res += ((bit % 3) << i);
//        }
//        return res;
//    }
//}