<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/12 10:27
 * Des: 5289. 公平分发饼干
 *      https://leetcode.cn/problems/fair-distribution-of-cookies/
 *      给你一个整数数组 cookies ，其中 cookies[i] 表示在第 i 个零食包中的饼干数量。另给你一个整数 k 表示等待分发零食包的孩子数量，所有 零食包都需要分发。在同一个零食包中的所有饼干都必须分发给同一个孩子，不能分开。
 *      分发的 不公平程度 定义为单个孩子在分发过程中能够获得饼干的最大总数。
 *      返回所有分发的最小不公平程度。
 */

class Solution
{

    /**
     * @param Integer[] $cookies
     * @param Integer $k
     * @return Integer
     */
    function distributeCookies($cookies, $k)
    {
        $n = count($cookies);
//        $list = $this->f($n, $k);
//        print_r($list);

        $ans = PHP_INT_MAX;
        $list = range(1, $k);
        for ($i = 1; $i < $n; $i++) {
            $items = [];
            foreach ($list as $v) {
                for ($j = 1; $j <= $k; $j++) {
                    $items[] = strval($v) . strval($j);
                }
            }
            if($i==$n-1) {
                foreach($items as $k => $item) {
                    $hash = [];
                    for ($i =0;$i < $n; $i++){
                        $hash[$items[$i]] =1;
                    }
                    if(count($hash)!==$k){
                        unset($items[$k]);
                    }
                }
            }
            $list = $items;
        }
        var_dump(count($list));
        foreach ($list as $fen) {
            $ma = PHP_INT_MIN;
            $res = [];
            for ($i = 0; $i < $n; $i++) {
                $res[$fen[$i]] = isset($res[$fen[$i]]) ? $res[$fen[$i]] + $cookies[$i] : $cookies[$i];
                $ma = max($ma, $res[$fen[$i]]);
            }
            $ans = min($ans, $ma);
        }
        return $ans;
    }

    function f($n, $k)
    {
        $list = range(1, $k);
        for ($i = 1; $i < $n; $i++) {
            $items = [];
            foreach ($list as $v) {
                for ($j = 1; $j <= $k; $j++) {
                    $items[] = strval($v) . strval($j);
                }
            }
            $list = $items;
        }
        return $list;
    }
}

var_dump((new Solution)->distributeCookies([8, 15, 10, 20, 8], 2));//31
var_dump((new Solution)->distributeCookies([76265,7826,16834,63341,68901,58882,50651,75609],8));

//唉 这道题暴力没过 可惜
//这8位的8进制数组爆了, 恶心
//我日, 和1723. 完成所有工作的最短时间  https://leetcode.cn/problems/find-minimum-time-to-finish-all-jobs/的逻辑一模一样, 代码都一模一样
//class Solution {
//
//    int[] jobs;
//    int n, kk;
//    int ans = 0x3f3f3f3f;
//    public int distributeCookies(int[] cookies, int k) {
//        jobs = cookies;
//        n = cookies.length;
//        kk = k;
//        int[] sum = new int[k];
//        dfs(0, 0, sum, 0);
//        return ans;
//    }
//    /**
//     * 【补充说明】不理解可以看看下面的「我猜你问」的 Q5 哦 ~
//     *
//     * u     : 当前处理到那个 job
//     * used  : 当前分配给了多少个工人了
//     * sum   : 工人的分配情况          例如：sum[0] = x 代表 0 号工人工作量为 x
//     * max   : 当前的「最大工作时间」
//     */
//    void dfs(int u, int used, int[] sum, int max) {
//        if (max >= ans) return;
//        if (u == n) {
//            ans = max;
//            return;
//        }
//        // 优先分配给「空闲工人」
//        if (used < kk) {
//            sum[used] = jobs[u];
//            dfs(u + 1, used + 1, sum, Math.max(sum[used], max));
//            sum[used] = 0;
//        }
//        for (int i = 0; i < used; i++) {
//            sum[i] += jobs[u];
//            dfs(u + 1, used, sum, Math.max(sum[i], max));
//            sum[i] -= jobs[u];
//        }
//    }
//}