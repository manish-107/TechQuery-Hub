SELECT * FROM Users;

SELECT * FROM Questions;

SELECT * FROM Answers;

SELECT * FROM Tags;

/*1)to retrive question and user*/
SELECT Questions.QuestionID, Questions.UserID, Users.Username, Questions.Title, Questions.Body, Questions.CreationDate FROM Questions JOIN Users ON Questions.UserID = Users.UserID;


2)//to retrive perticular question using condition//
SELECT Questions.QuestionID, Questions.UserID, Users.Username, Questions.Title, Questions.Body, Questions.CreationDate FROM Questions JOIN Users ON Questions.UserID = Users.UserID  WHERE Questions.UserID = 4;


3)//to retrive answer and user//
SELECT Answers.AnswerID, Answers.UserID, Users.Username, Answers.Body, Answers.CreationDate FROM Answers JOIN Users ON Answers.UserID = Users.UserID WHERE Answers.QuestionID =4;


4)//to retrive answers of a question//
SELECT Answers.QuestionID,Questions.Body AS Question,Answers.Body As Answer FROM Answers JOIN Questions ON Answers.QuestionID=Questions.QuestionID;

5)//to retrive perticular Questions answer//
SELECT Answers.QuestionID,Questions.Body AS Question,Answers.Body AS Answers FROM Answers JOIN Questions ON Answers.QuestionID=Questions.QuestionID  WHERE  Answers.QuestionID= 4;

6)//retriving  tagname related question an answer// 
SELECT T.TagName,Q.Body AS QuestionBody, A.Body AS AnswerBody FROM Tags T JOIN QuestionTags QT ON T.TagID = QT.TagID JOIN Questions Q ON QT.QuestionID = Q.QuestionID JOIN Answers A ON Q.QuestionID = A.QuestionID;

7)//select question and answer using tags //
SELECT Q.Body AS QuestionBody,A.Body AS AnswerBody FROM Questions Q JOIN QuestionTags QT ON Q.QuestionID = QT.QuestionID JOIN Answers A ON Q.QuestionID = A.QuestionID JOIN Tags T ON T.tagID = QT.TagID  WHERE T.TagName ="create table";

8)//retriving answer and comments//
SELECT Answers.Body As Answer,answercomment.Body As Comments FROM answercomment JOIN Answers ON answercomment.AnswerID=Answers.AnswerID;

9)//retriving answer and comments using perticular condition//
SELECT Answers.AnswerID,Answers.Body As Answer,answercomment.Body As Comments FROM answercomment JOIN Answers ON answercomment.AnswerID=Answers.AnswerID WHERE Answers.AnswerID=4;

9)s//...//
SELECT Answers.AnswerID,Answers.Body As Answer,answercomment.Body As Comments FROM answercomment JOIN Answers ON answercomment.AnswerID=Answers.AnswerID WHERE Answers.Body LIKE '%create table%';


10)//counting questions in table//
SELECT COUNT(*) FROM Questions;

11)//counting question in table using condition//
SELECT COUNT(*) FROM Questions WHERE title LIKE '%table%';

12)//counting likes for perticular answer//
SELECT COUNT(*) AS NumberOfLikes FROM Votes WHERE AnswerID = 123 AND VoteType = 'like';

12)//......//
SELECT Answers.Body As Answer,COUNT(*) AS NumberOfLikes FROM votes JOIN Answers ON votes.AnswerID=Answers.AnswerID WHERE votes.AnswerID = 2 AND VoteType = 'like';

13)//counting dislikes for perticular Question//
SELECT COUNT(*) AS NumberOfdisLikes FROM Votes WHERE AnswerID = 3 AND VoteType = 'dislike';

14)//counting number likes for perticular question//
SELECT COUNT(*) AS NumberOfLikes FROM Votes WHERE QuestionID = 123 AND VoteType = 'like';

15)//counting number of dislikes for perticular question//
SELECT COUNT(*) AS NumberOfdisLikes FROM Votes WHERE QuestionID = 123 AND VoteType = 'dislike';

SELECT Users.Username, Questions.Title, Answers.Body FROM Answers JOIN Users ON Answers.UserID = Users.UserID JOIN Questions ON Answers.QuestionID = Questions.QuestionID;

SELECT Users.Username, Questions.Title, Answers.Body FROM Answers JOIN Users ON Answers.UserID = Users.UserID JOIN Questions ON Answers.QuestionID = Questions.QuestionID WHERE Answers.AnswerID=3;
