-- 1693. 每天的领导和合伙人
-- https://leetcode.cn/problems/daily-leads-and-partners/

select date_id, make_name, count(distinct lead_id) as unique_leads, count(distinct partner_id) as unique_partners from DailySales group by date_id,make_name

--     执行用时：582 ms, 在所有 MySQL 提交中击败了37.89%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：22 / 22