<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/8 11:08
 * Des: todo list
 */

class Solution
{

    /**
     * @param String $pressedKeys
     * @return Integer
     */
    function countTexts($pressedKeys)
    {
        $dp = [1, 1];
        $map = [0, 3, 3, 3, 3, 3, 4, 3, 4];
        $mod = 1000000009;
        for ($i = 1; $i <= strlen($pressedKeys); $i++) {
            $count = $map[intval($pressedKeys[$i])];
            $s = 0;
            for ($j = 1; $j <= $count; $j++) {
                if ($i - $j >= 0 && $pressedKeys[$i - $j] == $pressedKeys[$i - 1]) {
                    $pre = $i - $j;
                    $s += $dp[$pre];
                }
            }
            $dp[$i] = $s;
        }
        print_r($dp);
        return end($dp);
    }

//    const mod int = 1e9 + 7

//func init() {
//	f[0] = 1
//	f[1] = 1
//	f[2] = 2
//	for i := 3; i < 1e5+3; i++ {
//		f[i] = (f[i-1] + f[i-2] + f[i-3]) % mod
//	}
//
//g[0] = 1
//	g[1] = 1
//	g[2] = 2
//	g[3] = 4
//	for i := 4; i < 1e5+3; i++ {
//        g[i] = (g[i-1] + g[i-2] + g[i-3] + g[i-4]) % mod
//	}
//}
//
//func countTexts(s string) (ans int) {
//            ans = 1
//	for i, n := 0, len(s); i < n; {
//        st := i
//		v := s[st]
//		for ; i < n && s[i] == v; i++ {
//        }
//		d := i-st
//		if v == '7' || v == '9' {
//            ans = (ans *g[d]) % mod
//		} else {
//            ans = (ans *f[d]) % mod
//		}
//	}
//
//	ans %= mod
//	return
//}


    function countTextsxx($pressedKeys)
    {
        $f = [0, 1, 2, 4];
        $s = 0;
        $count = 1;
        $wds = [];
        for ($i = 1; $i < strlen($pressedKeys); $i++) {
            $str = '';
            if ($pressedKeys[$i] !== $pressedKeys[$i - 1]) {
                $str = substr($pressedKeys, $s, $i - $s);
                var_dump($str);
                $s = $i;
//                $count = $count * $this->f($str) % 1000000009;
                $count = $count * $this->f($str);
            }
        }
//        $count = $count * $this->f(substr($pressedKeys, $s, $i-$s)) % 1000000009;
        var_dump(substr($pressedKeys, $s, strlen($pressedKeys) - $s));
        $count = $count * $this->f(substr($pressedKeys, $s, strlen($pressedKeys) - $s));
        return $count;
    }

    function f($s)
    {
        if (strlen($s) == 1) {
            return 1;
        } else if (strlen($s) == 2) {
            return 2;
        }
        return 2 * $this->f(substr($s, 0, strlen($s) - 1));
    }
}


var_dump((new Solution())->countTexts("22233"));
//var_dump((new Solution())->countTexts("222222222222222222222222222222222222"));


/*掉大分
知道是dp, 但是没弄出来状态公式
唉, 继续修炼*/