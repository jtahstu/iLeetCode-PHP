-- 608. 树节点
-- https://leetcode.cn/problems/tree-node/

select id,if(tree.p_id is null,'Root',if(inner_id>0,'Inner','Leaf')) as Type from tree left join (select distinct p_id as inner_id from tree where p_id is not null)t on tree.id=t.inner_id

-- 这个写法比较推荐
select id,
       case when t.p_id is null then 'Root'
            when t.id in (select p_id from tree ) then 'Inner'
            else 'Leaf'
           end as Type
from tree t

--     执行用时：559 ms, 在所有 MySQL 提交中击败了11.00%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：19 / 19