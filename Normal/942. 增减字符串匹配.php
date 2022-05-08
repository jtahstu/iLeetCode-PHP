<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/8 23:30
 * Des: 942. 增减字符串匹配
 *      https://leetcode.cn/problems/di-string-match/
 */

class Solution
{

    /**
     * @param String $s
     * @return Integer[]
     */
    function diStringMatch($s)
    {
        $nums = [0];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == 'I') {  //大于的时候就直接放当前值
                $nums[$i + 1] = $i + 1;
            } else {            //小于的时候就让前面的全部加一, 当前放0
                foreach ($nums as $k => $num) {
                    $nums[$k]++;
                    $nums[$i + 1] = 0;
                }
            }
        }
        return $nums;
    }
}

echo implode(" ", (new Solution)->diStringMatch("IDID")) . PHP_EOL;
echo implode(" ", (new Solution)->diStringMatch("III")) . PHP_EOL;
echo implode(" ", (new Solution)->diStringMatch("DDI")) . PHP_EOL;
echo implode(" ", (new Solution)->diStringMatch("DDIDDIDIDIDIDIDID")) . PHP_EOL;

/**
 * 执行用时：3028 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：21 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：95 / 95
 */

/**
 * 大于就把当前最小值放进去, 小于就把当前最大值放进去
 *  var diStringMatch = function(S) {
    let l = 0;
    let r = S.length;
    const ans = [];
    for(let s of S){
        if(s === 'I'){
            ans.push(l++)
        }else{
            ans.push(r--)
        }
    }
    ans.push(l++)
    return ans
    };
 */