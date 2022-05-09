-- 1795. 每个产品在不同商店的价格
-- https://leetcode.cn/problems/rearrange-products-table/

-- 普通思路
select product_id,'store1' as store,store1 as price from Products where store1 is not null
union all
select product_id,'store2' as store,store2 as price from Products where store2 is not null
union all
select product_id,'store3' as store,store3 as price from Products where store3 is not null

-- 借助sql的行转列(PIVOT)与列转行(UNPIVOT), 推荐
select product_id,lower(store) as store,price from Products unpivot (price for store in(store1,store2,store3))

--     执行用时：544 ms, 在所有 MySQL 提交中击败了68.15%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：22 / 22