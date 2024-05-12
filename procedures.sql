--Retrieve questions title, question description ,answer count and vote counts.
DELIMITER //

CREATE PROCEDURE GetQuestionsWithAnswersAndVoteCount()
BEGIN
    SELECT 
        q.questionid,
        q.title AS question_title,
        q.qdesc AS question_description,
        COUNT(DISTINCT a.answerid) AS answer_count,
        COUNT(DISTINCT v.voteid) AS vote_count
    FROM 
        questions q
    LEFT JOIN 
        answers a ON q.questionid = a.questionid
    LEFT JOIN 
        votes v ON q.questionid = v.questionid
    GROUP BY 
        q.questionid;
END//

DELIMITER ;

CALL GetQuestionsWithAnswersAndVoteCount();


--show PROCEDURE
SELECT 
    ROUTINE_NAME 
FROM 
    information_schema.ROUTINES 
WHERE 
    ROUTINE_TYPE = 'PROCEDURE';
-------DROP TABLE-------
 DROP PROCEDURE IF EXISTS GetQuestionDetails;

DELIMITER //
CREATE PROCEDURE GetQuestionDetails(IN question_id INT)
BEGIN
    SELECT 
        q.title AS question_title,
        a.ansdesc AS answer_description,
        COUNT(DISTINCT v.voteid) AS vote_count,
        COUNT(DISTINCT a.answerid) AS answer_count
    FROM 
        questions q
    LEFT JOIN 
        answers a ON q.questionid = a.questionid
    LEFT JOIN 
        votes v ON q.questionid = v.questionid
    WHERE 
        q.questionid = question_id
    GROUP BY 
        q.questionid, a.answerid;
END//

DELIMITER ;

 call GetQuestionDetails(1);