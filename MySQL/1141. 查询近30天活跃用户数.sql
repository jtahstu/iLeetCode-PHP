-- 1141. 查询近30天活跃用户数
-- https://leetcode.cn/problems/user-activity-for-the-past-30-days-i/

select activity_date as day,count(distinct user_id) as active_users from Activity where activity_date between "2019-06-28" and "2019-07-27" group by activity_date order by activity_date

--     执行用时：    557 ms        , 在所有 MySQL 提交中击败了    7.98%    的用户
--     内存消耗：    0 B        , 在所有 MySQL 提交中击败了    100.00%    的用户
--     通过测试用例：    14 / 14