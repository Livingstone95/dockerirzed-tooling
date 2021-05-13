CREATE USER 'david'@'%' IDENTIFIED WITH mysql_native_password BY 'david';
GRANT ALL PRIVILEGES ON * . * TO 'david'@'%';
CREATE DATABASE toolingdb;
use toolingdb;
FLUSH PRIVILEGES;
