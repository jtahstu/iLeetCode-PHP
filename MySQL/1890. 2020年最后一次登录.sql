-- 1890. 2020年最后一次登录
-- https://leetcode.cn/problems/the-latest-login-in-2020/

select user_id,max(time_stamp) as last_stamp from Logins where date(time_stamp) between '2020-01-01' and '2020-12-31'  group by user_id

-- 执行用时：618 ms, 在所有 MySQL 提交中击败了74.01%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：23 / 23