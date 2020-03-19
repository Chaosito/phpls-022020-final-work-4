# phpls-022020-final-work-4

## Выпускной проект №4 - "Laravel проект - интернет-каталог"

##### 1. Create DB & user

CREATE DATABASE `final-work-4`CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE USER 'final-work-4'@'localhost' IDENTIFIED BY 'final-work-4'; 

GRANT ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, EXECUTE, INDEX, INSERT, LOCK TABLES, REFERENCES, SELECT, SHOW VIEW, TRIGGER, UPDATE ON `final-work-4`.* TO 'final-work-4'@'localhost' WITH GRANT OPTION; 
