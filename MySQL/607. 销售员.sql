-- 607. 销售员
-- https://leetcode.cn/problems/sales-person/

select name from SalesPerson where name not in
    (select distinct s.name from SalesPerson s,Company c,Orders o where s.sales_id =o.sales_id and c.com_id =o.com_id and c.name='RED')

--     执行用时：1391 ms, 在所有 MySQL 提交中击败了68.81%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：20 / 20