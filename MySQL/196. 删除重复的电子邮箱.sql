-- 196. 删除重复的电子邮箱
-- https://leetcode.cn/problems/delete-duplicate-emails/

delete p from Person p left join (select min(id) as ids from Person group by email) t on p.id=t.ids where t.ids is null

-- 执行用时：634 ms, 在所有 MySQL 提交中击败了80.10%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：22 / 22

-- 其他人的写法
DELETE from Person
Where Id not in (
    Select Id
    From(
            Select MIN(Id) as id
            From Person
            Group by Email
        ) t
)

delete u from Person u , Person v where v.id < u.id and u.email = v.email

DELETE p1 FROM Person p1, Person p2 WHERE p1.Email = p2.Email AND p1.Id > p2.Id