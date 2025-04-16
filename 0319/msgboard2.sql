DROP database IF EXISTS msgboard;
create database msgboard;
use msgboard;
DROP TABLE IF EXISTS account;
CREATE TABLE account(
    indo INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    pass VARCHAR(256) NOT NULL
);