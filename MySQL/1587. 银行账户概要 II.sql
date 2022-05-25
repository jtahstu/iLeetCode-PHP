-- 1587. 银行账户概要 II
-- https://leetcode.cn/problems/bank-account-summary-ii/

select name,sum(amount) as balance from Users u,Transactions t where u.account=t.account group by t.account having balance>10000

--     执行用时：844 ms, 在所有 MySQL 提交中击败了20.20%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：16 / 16