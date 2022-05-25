-- 182. 查找重复的电子邮箱
-- https://leetcode.cn/problems/duplicate-emails/submissions/

select Email from Person group by Email having count(*)>1

--     执行用时：399 ms, 在所有 MySQL 提交中击败了57.38%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：15 / 15