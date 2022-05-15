-- 1729. 求关注者的数量
-- https://leetcode.cn/problems/find-followers-count/

select user_id,count(distinct follower_id) as followers_count from Followers group by user_id order by user_id asc

--     执行用时：556 ms, 在所有 MySQL 提交中击败了69.65%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：22 / 22