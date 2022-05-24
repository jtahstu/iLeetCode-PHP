-- 1407. 排名靠前的旅行者
-- https://leetcode.cn/problems/top-travellers/

select name,sum(if(distance is null,0,distance)) as travelled_distance from Users u left join Rides r on u.id=r.user_id group by u.id order by travelled_distance desc,name asc

--     执行用时：832 ms, 在所有 MySQL 提交中击败了60.30%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：17 / 17