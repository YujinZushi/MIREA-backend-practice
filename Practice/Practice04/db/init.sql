CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

CREATE TABLE IF NOT EXISTS users(
	user_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	name VARCHAR(50) NOT NULL,
  	password VARCHAR(50) NOT NULL
);

INSERT INTO users (name, password) VALUES ('admin', 'admin');
INSERT INTO users (name, password) VALUES ('user1', 'admin');
INSERT INTO users (name, password) VALUES ('user2', 'admin');

CREATE TABLE IF NOT EXISTS tracks(
	track_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	name VARCHAR(200) NOT NULL,
  	duration INT NOT NULL
);

INSERT INTO tracks (name, duration) VALUES ('Deepnoid - Bop & Subwave', '305');
INSERT INTO tracks (name, duration) VALUES ('GANG - Elem feat. Virtus.pro', '128');
INSERT INTO tracks (name, duration) VALUES ('Overtime - KNOWER', '285');
INSERT INTO tracks (name, duration) VALUES ('Spike - Max Cooper', '456');

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password'; 