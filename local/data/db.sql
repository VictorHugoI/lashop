
CREATE DATABASE lashop CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE mysql;

CREATE USER 'lashop'@'localhost' IDENTIFIED BY 'lashop';
GRANT ALL PRIVILEGES ON lashop.* TO 'lashop'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
