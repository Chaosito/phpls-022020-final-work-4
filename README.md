# phpls-022020-final-work-4

## Выпускной проект №4 - "Laravel проект - интернет-каталог"

##### 1. Create DB

```
CREATE DATABASE `final-work-4`CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 
```

##### 2. Create User
```
CREATE USER 'final-work-4'@'localhost' IDENTIFIED BY 'final-work-4'; 
```

##### 1. Grant rights
```
GRANT ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, EXECUTE, INDEX, INSERT, LOCK TABLES, REFERENCES, SELECT, SHOW VIEW, TRIGGER, UPDATE ON `final-work-4`.* TO 'final-work-4'@'localhost' WITH GRANT OPTION; 
```

##### 2. Install and set options:
Site-path: phpls-022020-final-work-4/public

composer install

copy .env.example to .env and fill

php artisan key is missing (click button on page)


