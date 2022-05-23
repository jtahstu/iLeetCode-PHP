-- 1741. 查找每个员工花费的总时间
-- https://leetcode.cn/problems/find-total-time-spent-by-each-employee/

select event_day as `day`,emp_id,(sum(out_time)-sum(in_time)) as total_time from Employees group by emp_id,event_day

--     执行用时：543 ms, 在所有 MySQL 提交中击败了67.47%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：22 / 22