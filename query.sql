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

/* tags table */
CREATE TABLE tags(tagid INT PRIMARY KEY AUTO_INCREMENT,tagname varchar(15) NOT NULL);

INSERT INTO tags(tagname)VALUES('sql');

/* questions tag */
CREATE TABLE questiontags(questionid INT,tagid INT,FOREIGN KEY(questionid) REFERENCES questions(questionid),FOREIGN KEY(tagid)REFERENCES tags(tagid),PRIMARY KEY(questionID,tagid));

INSERT INTO questiontags (questionid, tagid) VALUES(1, 2);

/*answer comments */
CREATE TABLE answercomment(acommid INT PRIMARY KEY AUTO_INCREMENT,userid INT,answerid INT,acdesc TEXT NOT NULL,FOREIGN KEY(answerid)REFERENCES answers(answerid),FOREIGN KEY(userid)REFERENCES users(userid));

INSERT INTO answercomment(answerid,userid,acdesc)VALUES(1,3,'you should ask questions in understanding way');

/* votes */
CREATE TABLE votes (voteid INT PRIMARY KEY AUTO_INCREMENT,userid INT,questionid INT,votetype ENUM('like', 'dislike') NOT NULL,FOREIGN KEY (userid) REFERENCES users(userid),FOREIGN KEY (questionid) REFERENCES questions(questionid));

INSERT INTO votes (userid, questionid, votetype) VALUES (2, 1, 'like');



SELECT * FROM users;

SELECT * FROM questions;

SELECT * FROM answers;

SELECT * FROM tags;

    /*1)to retrive questions and user*/
    SELECT questions.questionid, questions.userid, users.username, questions.title, questions.qdesc, questions.qcreationdate FROM questions JOIN users ON questions.userid = users.userid;


2)//to retrive perticular questions using condition//
SELECT questions.questionid, questions.userid, users.username, questions.title, questions.qdesc, questions.qcreationdate FROM questions JOIN users ON questions.userid = users.userid  WHERE questions.userid = 4;


3)//to retrive answer and user//
SELECT answers.answerid, answers.userid, users.username, answers.ansdesc, answers.CreationDate FROM answers JOIN users ON answers.userid = users.userid WHERE answers.questionid =4;


4)//to retrive answers of a questions//
SELECT answers.questionid,questions.qdesc AS Question,answers.ansdesc As answer FROM answers JOIN questions ON answers.questionid=questions.questionid;

5)//to retrive perticular questions answer//
SELECT answers.questionid,questions.qdesc AS Question,answers.Body AS answers FROM answers JOIN questions ON answers.questionid=questions.questionid  WHERE  answers.questionid= 4;

6)//retriving  tagname related questions an answer// 
SELECT T.tagname,Q.Body AS qdesc, A.Body AS ansdesc FROM tags T JOIN QuestionTags QT ON T.tagid = QT.tagid JOIN questions Q ON QT.questionid = Q.questionid JOIN answers A ON Q.questionid = A.questionid;

7)//select questions and answer using tags //
SELECT Q.qdesc AS qdesc,A.Body AS ansdesc FROM questions Q JOIN QuestionTags QT ON Q.questionid = QT.questionid JOIN answers A ON Q.questionid = A.questionid JOIN tags T ON T.tagID = QT.tagid  WHERE T.tagname ="create table";

8)//retriving answer and comments//
SELECT answers.Body As answer,answercomment.Body As comments FROM answercomment JOIN answers ON answercomment.answerid=answers.answerid;

9)//retriving answer and comments using perticular condition//
SELECT answers.answerid,answers.Body As answer,answercomment.Body As comments FROM answercomment JOIN answers ON answercomment.answerid=answers.answerid WHERE answers.answerid=4;

9)s//...//
SELECT answers.answerid,answers.Body As answer,answercomment.Body As comments FROM answercomment JOIN answers ON answercomment.answerid=answers.answerid WHERE answers.Body LIKE '%create table%';


10)//counting questions in table//
SELECT COUNT(*) FROM questions;

11)//counting questions in table using condition//
SELECT COUNT(*) FROM questions WHERE title LIKE '%table%';

12)//counting likes for perticular answer//
SELECT COUNT(*) AS NumberOfLikes FROM votes WHERE answerid = 123 AND votetype = 'like';

12)//......//
SELECT answers.Body As answer,COUNT(*) AS NumberOfLikes FROM votes JOIN answers ON votes.answerid=answers.answerid WHERE votes.answerid = 2 AND votetype = 'like';

13)//counting dislikes for perticular Question//
SELECT COUNT(*) AS NumberOfdisLikes FROM votes WHERE answerid = 3 AND votetype = 'dislike';

14)//counting number likes for perticular questions//
SELECT COUNT(*) AS NumberOfLikes FROM votes WHERE questionid = 123 AND votetype = 'like';

15)//counting number of dislikes for perticular questions//
SELECT COUNT(*) AS NumberOfdisLikes FROM votes WHERE questionid = 123 AND votetype = 'dislike';

SELECT users.username, questions.title, answers.Body FROM answers JOIN users ON answers.userid = users.userid JOIN questions ON answers.questionid = questions.questionid;

SELECT users.username, questions.title, answers.Body FROM answers JOIN users ON answers.userid = users.userid JOIN questions ON answers.questionid = questions.questionid WHERE answers.answerid=3;
