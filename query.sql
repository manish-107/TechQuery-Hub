CREATE TABLE techquery;

USE techquery;

/* create table users */
CREATE TABLE users (userid INT PRIMARY KEY AUTO_INCREMENT,username VARCHAR(20) NOT NULL,password VARCHAR(30) NOT NULL,email VARCHAR(50) NOT NULL,joindate TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

INSERT INTO users (username, password, email) VALUES('john_doe','password','john@example.com');

/* questions table */
CREATE TABLE questions(questionid INT PRIMARY KEY AUTO_INCREMENT,userid INT NOT NULL,title VARCHAR(255) NOT NULL, qdesc TEXT NOT NULL,  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY (userid) REFERENCES users(userid));

INSERT INTO questions (userid, title, qdesc)VALUES (1, 'How to create a table in SQL?', 'I want to learn how to create a table in SQL.');

/* create answers table */
CREATE TABLE answers(answerid INT PRIMARY KEY AUTO_INCREMENT,questionid INT NOT NULL,userid INT NOT NULL,ansdesc text NOT NULL ,creationdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,FOREIGN KEY(userid) REFERENCES users(userid),FOREIGN KEY(questionid) REFERENCES questions(questionid));

INSERT INTO answers (answerid,questionid, userid, ansdesc) VALUES(1, 1, 1, 'This is the first answer to questions 1.');

/* Tags table */
CREATE TABLE tags(tagid INT PRIMARY KEY AUTO_INCREMENT,tagname varchar(15) NOT NULL);

INSERT INTO Tags(TagName)VALUES('sql');

/* questions tag */
CREATE TABLE questiontags(questionid INT,tagid INT,FOREIGN KEY(questionid) REFERENCES questions(questionid),FOREIGN KEY(tagid)REFERENCES tags(tagid),PRIMARY KEY(questionID,tagid));

INSERT INTO questiontags (questionid, tagid) VALUES(1, 2);

/*Answer comments */
CREATE TABLE answercomment(acommid INT PRIMARY KEY AUTO_INCREMENT,userid INT,answerid INT,acdesc TEXT NOT NULL,FOREIGN KEY(answerid)REFERENCES answers(answerid),FOREIGN KEY(userid)REFERENCES users(userid));

INSERT INTO answercomment(answerid,userid,acdesc)VALUES(1,3,'you should ask questions in understanding way');

/* Votes */
CREATE TABLE votes (voteid INT PRIMARY KEY AUTO_INCREMENT,userid INT,questionid INT,votetype ENUM('like', 'dislike') NOT NULL,FOREIGN KEY (userid) REFERENCES users(userid),FOREIGN KEY (questionid) REFERENCES questions(questionid));

INSERT INTO votes (userid, questionid, votetype) VALUES (2, 1, 'like');



SELECT * FROM users;

SELECT * FROM questions;

SELECT * FROM answers;

SELECT * FROM Tags;

    /*1)to retrive questions and user*/
    SELECT questions.questionid, questions.userid, users.username, questions.title, questions.qdesc, questions.qcreationdate FROM questions JOIN users ON questions.userid = users.userid;


2)//to retrive perticular questions using condition//
SELECT questions.questionid, questions.userid, users.username, questions.title, questions.qdesc, questions.qcreationdate FROM questions JOIN users ON questions.userid = users.userid  WHERE questions.userid = 4;


3)//to retrive answer and user//
SELECT answers.AnswerID, answers.userid, users.username, answers.Body, answers.CreationDate FROM answers JOIN users ON answers.userid = users.userid WHERE answers.questionid =4;


4)//to retrive answers of a questions//
SELECT answers.questionid,questions.qdesc AS Question,answers.Body As Answer FROM answers JOIN questions ON answers.questionid=questions.questionid;

5)//to retrive perticular questions answer//
SELECT answers.questionid,questions.qdesc AS Question,answers.Body AS answers FROM answers JOIN questions ON answers.questionid=questions.questionid  WHERE  answers.questionid= 4;

6)//retriving  tagname related questions an answer// 
SELECT T.TagName,Q.Body AS QuestionBody, A.Body AS AnswerBody FROM Tags T JOIN QuestionTags QT ON T.TagID = QT.TagID JOIN questions Q ON QT.questionid = Q.questionid JOIN answers A ON Q.questionid = A.questionid;

7)//select questions and answer using tags //
SELECT Q.Body AS QuestionBody,A.Body AS AnswerBody FROM questions Q JOIN QuestionTags QT ON Q.questionid = QT.questionid JOIN answers A ON Q.questionid = A.questionid JOIN Tags T ON T.tagID = QT.TagID  WHERE T.TagName ="create table";

8)//retriving answer and comments//
SELECT answers.Body As Answer,answercomment.Body As Comments FROM answercomment JOIN answers ON answercomment.AnswerID=answers.AnswerID;

9)//retriving answer and comments using perticular condition//
SELECT answers.AnswerID,answers.Body As Answer,answercomment.Body As Comments FROM answercomment JOIN answers ON answercomment.AnswerID=answers.AnswerID WHERE answers.AnswerID=4;

9)s//...//
SELECT answers.AnswerID,answers.Body As Answer,answercomment.Body As Comments FROM answercomment JOIN answers ON answercomment.AnswerID=answers.AnswerID WHERE answers.Body LIKE '%create table%';


10)//counting questions in table//
SELECT COUNT(*) FROM questions;

11)//counting questions in table using condition//
SELECT COUNT(*) FROM questions WHERE title LIKE '%table%';

12)//counting likes for perticular answer//
SELECT COUNT(*) AS NumberOfLikes FROM Votes WHERE AnswerID = 123 AND VoteType = 'like';

12)//......//
SELECT answers.Body As Answer,COUNT(*) AS NumberOfLikes FROM votes JOIN answers ON votes.AnswerID=answers.AnswerID WHERE votes.AnswerID = 2 AND VoteType = 'like';

13)//counting dislikes for perticular Question//
SELECT COUNT(*) AS NumberOfdisLikes FROM Votes WHERE AnswerID = 3 AND VoteType = 'dislike';

14)//counting number likes for perticular questions//
SELECT COUNT(*) AS NumberOfLikes FROM Votes WHERE questionid = 123 AND VoteType = 'like';

15)//counting number of dislikes for perticular questions//
SELECT COUNT(*) AS NumberOfdisLikes FROM Votes WHERE questionid = 123 AND VoteType = 'dislike';

SELECT users.username, questions.title, answers.Body FROM answers JOIN users ON answers.userid = users.userid JOIN questions ON answers.questionid = questions.questionid;

SELECT users.username, questions.title, answers.Body FROM answers JOIN users ON answers.userid = users.userid JOIN questions ON answers.questionid = questions.questionid WHERE answers.AnswerID=3;
