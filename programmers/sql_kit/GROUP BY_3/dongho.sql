--https://programmers.co.kr/learn/courses/30/lessons/59412
--�Ծ� �ð� ���ϱ�

SELECT HOUR(DATETIME) AS HOUR, COUNT(*) AS COUNT
  FROM ANIMAL_OUTS
 WHERE HOUR(DATETIME) BETWEEN '09' AND '19'
 GROUP BY 1 -- HOUR(DATETIME)
 ORDER BY 1 -- HOUR(DATETIME)