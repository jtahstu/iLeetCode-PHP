-- 1158. 市场分析 I
-- https://leetcode.cn/problems/market-analysis-i/

select user_id as buyer_id,join_date,if(t.c is null,0,t.c) as orders_in_2019
from Users u left join (select buyer_id,count(*)c from Orders where buyer_id != seller_id and order_date>='2019-01-01' and order_date <='2019-12-31' group by buyer_id)t
    on u.user_id=t.buyer_id

--     执行用时：1185 ms, 在所有 MySQL 提交中击败了74.14%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：15 / 15