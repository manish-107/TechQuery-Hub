-- triggers

--check weather email already exists in database
DELIMITER //

CREATE TRIGGER before_user_insert
BEFORE INSERT ON users
FOR EACH ROW
BEGIN DECLARE email_count INT;
    SELECT COUNT(*) INTO email_count FROM users WHERE email = NEW.email;
    IF email_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email already exists in the database';
    END IF;
END;
//

DELIMITER ;

--delete question
DELIMITER //
CREATE TRIGGER delete_question
BEFORE DELETE ON questions
FOR EACH ROW
BEGIN
    DELETE FROM votes WHERE questionid=OLD.questionid;
    DELETE FROM votes WHERE answerid IN(SELECT answerid FROM answers WHERE questionid=OLD.questionid);
    DELETE FROM answercomment WHERE answerid IN (SELECT questionid FROM answers WHERE questionid=OLD.questionid);
    DELETE FROM answers WHERE questionid=OLD.questionid;
END;
//
DELIMITER ;


--create a trigger on like
    DELIMITER //

    CREATE TRIGGER question_likes
    BEFORE INSERT ON votes
    FOR EACH ROW
    BEGIN
        DECLARE votetypes VARCHAR(10);
        DECLARE voteids INT;
        
        SELECT votetype, voteid INTO votetypes, voteids FROM votes WHERE questionid = NEW.questionid AND userid = NEW.userid LIMIT 1;
        
        IF votetypes IS NOT NULL AND votetypes <> NEW.votetype THEN
            UPDATE votes SET votetype = NEW.votetype WHERE voteid = voteids;
        END IF;
    END;
    //

    DELIMITER ;


    DELIMITER //

    CREATE TRIGGER question_likes
    BEFORE INSERT ON votes
    FOR EACH ROW
    BEGIN
        DECLARE existing_voteid INT;

        SELECT voteid INTO existing_voteid
        FROM votes
        WHERE questionid = NEW.questionid AND userid = NEW.userid
        LIMIT 1;

        IF existing_voteid IS NOT NULL THEN
            UPDATE votes SET votetype = NEW.votetype WHERE voteid = existing_voteid;
        ELSE
            INSERT INTO votes (userid, questionid, votetype) VALUES (NEW.userid, NEW.questionid, NEW.votetype);
        END IF;
    END;
    //

    DELIMITER ;
