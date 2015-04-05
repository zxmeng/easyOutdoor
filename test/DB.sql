CREATE DATABASE IF NOT EXISTS `EO` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `EO`;


CREATE TABLE User (
	uid INT AUTO_INCREMENT PRIMARY KEY,
	nickname VARCHAR(20) NOT NULL UNIQUE,
	email VARCHAR(30) NOT NULL UNIQUE,
	password VARCHAR(30) NOT NULL,
	phone INT NOT NULL UNIQUE,
	uPhoto VARCHAR(100) NOT NULL,
	uProfule VARCHAR(100),
	joinTime DATETIME NOT NULL,
	lastLoginTime DATETIME NOT NULL,
	status TINYINT NOT NULL
);

CREATE TABLE Event (
	eid INT AUTO_INCREMENT PRIMARY KEY,
	uid INT NOT NULL REFERENCES User,
	title VARCHAR(30) NOT NULL,
	venue VARCHAR(30) NOT NULL,
	district VARCHAR(30) NOT NULL,
	eDate DATETIME NOT NULL,
	eDescription VARCHAR(1000) NOT NULL,
	ePhoto VARCHAR(100),
	likeNo INT,
	parNo INT,
	limitation INT NOT NULL,
	postTime DATETIME NOT NULL,
	lastEditTime DATETIME NOT NULL
);

CREATE TABLE Review (
	pid INT AUTO_INCREMENT PRIMARY KEY,
	uid INT NOT NULL REFERENCES User,
	title VARCHAR(30) NOT NULL,
	venue VARCHAR(30) NOT NULL,
	district VARCHAR(30) NOT NULL,
	eDate DATETIME NOT NULL,
	eDescription VARCHAR(1000) NOT NULL,
	ePhoto VARCHAR(100),
	likeNo INT,
	parNo INT NOT NULL,
	postTime DATETIME NOT NULL,
	lastEditTime DATETIME NOT NULL
);

-- CREATE TABLE Chatroom(
-- 	rid INT AUTO_INCREMENT PRIMARY KEY,
-- 	rname VARCHAR(30) NOT NULL,
-- 	eid INT NOT NULL REFERENCES Event
-- );

CREATE TABLE Message(
	mid INT AUTO_INCREMENT PRIMARY KEY,
	content VARCHAR(200) NOT NULL,
	uid INT NOT NULL REFERENCES User,
	eid INT NOT NULL REFERENCES Event,
	time DATETIME NOT NULL
);

CREATE TABLE Comment(
	cid INT AUTO_INCREMENT PRIMARY KEY,
	content VARCHAR(200) NOT NULL,
	suid INT NOT NULL REFERENCES User,
	ruid INT REFERENCES User,
	eid INT NOT NULL REFERENCES Event,
	time DATETIME NOT NULL
);

CREATE TABLE Friend(
	uidA INT NOT NULL REFERENCES User,
	uidB INT NOT NULL REFERENCES User
);

CREATE TABLE Follow(
	uidA INT NOT NULL REFERENCES User,
	uidB INT NOT NULL REFERENCES User
);

CREATE TABLE Participation(
	uid INT NOT NULL REFERENCES User,
	eid INT NOT NULL REFERENCES Event,
	time DATETIME NOT NULL
);

CREATE TABLE LikeEvent(
	uid INT NOT NULL REFERENCES User,
	eid INT NOT NULL REFERENCES Event,
	time DATETIME NOT NULL
);

CREATE TABLE LikeReview(
	uid INT NOT NULL REFERENCES User,
	rid INT NOT NULL REFERENCES Review,
	time DATETIME NOT NULL
);

CREATE TABLE Notification(
	nid INT AUTO_INCREMENT PRIMARY KEY,
	fid INT NOT NULL,
	type VARCHAR(20) NOT NULL,
	status TINYINT NOT NULL
);