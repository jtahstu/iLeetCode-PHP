-- 1527. 患某种疾病的患者
-- https://leetcode.cn/problems/patients-with-a-condition/

select patient_id,patient_name,conditions  from Patients where (conditions  like "DIAB1%" or conditions like "% DIAB1%")

--     执行用时：382 ms, 在所有 MySQL 提交中击败了33.64%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：14 / 14