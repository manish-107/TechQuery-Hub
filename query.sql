CREATE TABLE techquery;

USE techquery;

/* create table users */
CREATE TABLE users (userid INT PRIMARY KEY AUTO_INCREMENT,username VARCHAR(20) NOT NULL,password VARCHAR(30) NOT NULL,email VARCHAR(50) NOT NULL,joindate TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

INSERT INTO users (username, password, email) VALUES('john_doe','password','john@example.com');

/* question table */
CREATE TABLE questions(questionid INT PRIMARY KEY AUTO_INCREMENT,userid INT NOT NULL,title VARCHAR(255) NOT NULL, qdesc TEXT NOT NULL,qcreationdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY (userid) REFERENCES users(userid));

INSERT INTO questions (userid, title, qdesc)VALUES (1, 'How to create a table in SQL?', 'I want to learn how to create a table in SQL.');

/* create answers table */
CREATE TABLE answers(answerid INT PRIMARY KEY AUTO_INCREMENT,questionid INT NOT NULL,userid INT NOT NULL,ansdesc text NOT NULL ,creationdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(userid) REFERENCES users(userid),FOREIGN KEY(questionid) REFERENCES questions(questionid));

INSERT INTO answers (answerid,questionid, userid, ansdesc) VALUES(1, 1, 1, 'This is the first answer to question 1.');

/* Tags table */
CREATE TABLE tags(tagid INT PRIMARY KEY AUTO_INCREMENT,tagname varchar(15) NOT NULL);

INSERT INTO Tags(TagName)VALUES('sql');

/* question tag */
CREATE TABLE questiontags(questionid INT,tagid INT,FOREIGN KEY(questionid) REFERENCES questions(questionid),FOREIGN KEY(tagid)REFERENCES tags(tagid),PRIMARY KEY(questionID,tagid));

INSERT INTO questiontags (questionid, tagid) VALUES(1, 2);

/*Answer comments */
CREATE TABLE answercomment(acommid INT PRIMARY KEY AUTO_INCREMENT,userid INT,answerid INT,acdesc TEXT NOT NULL,FOREIGN KEY(answerid)REFERENCES answers(answerid),FOREIGN KEY(userid)REFERENCES users(userid));

INSERT INTO answercomment(answerid,userid,acdesc)VALUES(1,3,'you should ask question in understanding way');

/* Votes */
CREATE TABLE votes (voteid INT PRIMARY KEY AUTO_INCREMENT,userid INT,questionid INT,votetype ENUM('like', 'dislike') NOT NULL,FOREIGN KEY (userid) REFERENCES users(userid),FOREIGN KEY (questionid) REFERENCES questions(questionid));

INSERT INTO votes (userid, questionid, votetype) VALUES (2, 1, 'like');

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
