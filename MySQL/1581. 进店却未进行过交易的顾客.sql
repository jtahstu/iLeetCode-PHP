-- 1581. 进店却未进行过交易的顾客
-- https://leetcode.cn/problems/customer-who-visited-but-did-not-make-any-transactions/

select customer_id,count(*) as count_no_trans from Visits where visit_id not in (select distinct visit_id from Transactions) group by customer_id

--     执行用时：1635 ms, 在所有 MySQL 提交中击败了6.94%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：28 / 28