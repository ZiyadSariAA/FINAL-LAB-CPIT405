
CREATE DATABASE WebsiteBookmarks_db;
USE WebsiteBookmarks_db;

CREATE TABLE infoBookmarks (
    id INT NOT NULL AUTO_INCREMENT,
    theLINK VARCHAR(255) NOT NULL,
    theName VARCHAR(255) NOT NULL,
    Description TEXT,
    timeThatCreated  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


INSERT INTO infoBookmarks (theLINK, theName, Description) 
VALUES ('https://www.youtube.com/watch?v=8B7o7GsrpXw','YouTube Video', 'Football vid .');

INSERT INTO infoBookmarks (theLINK, theName, Description) 
VALUES ('https://www.youtube.com/watch?v=rkuDUkOGDRQ','YouTube Video', 'Shark Tank vid .');

INSERT INTO infoBookmarks (theLINK, theName, Description) 
VALUES ('https://x.com/','X Platform', 'Social media platform.');

INSERT INTO infoBookmarks (theLINK, theName, Description) 
VALUES ('https://www.naukrigulf.com/data-analyst-jobs-in-saudi-arabia','Data Analyst Jobs', 'Job for data analysts.');
