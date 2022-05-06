-- 595. 大的国家
-- https://leetcode.cn/problems/big-countries/

select name,population,area from World where area>=3000000 or population>=25000000

--     执行用时：252 ms, 在所有 MySQL 提交中击败了49.00%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：5 / 5