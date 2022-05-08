-- 1484. 按日期分组销售产品
-- https://leetcode.cn/problems/group-sold-products-by-the-date/

select sell_date,count(distinct product) num_sold,group_concat(distinct product order by product asc) products from Activities group by sell_date order by sell_date

--     执行用时：474 ms, 在所有 MySQL 提交中击败了30.88%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：15 / 15