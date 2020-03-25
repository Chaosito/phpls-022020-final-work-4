# phpls-022020-final-work-4

## Выпускной проект №4 - "Laravel проект - интернет-каталог"

### Quick Guide:

##### 1. Скачать или клонировать репозиторий:
```
git clone repo
```

##### 2. Настроить точку входа: 
```
phpls-022020-final-work-4/public
```

##### 3. Установить зависимости
```
composer install
```

##### 4. Создать пустую БД
```
CREATE DATABASE `final-work-4`CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 
```

##### 5. Создать файл настроек из шаблона
```
cp .env.example .env
```

##### 6. Внести свои данные пользователя и БД в файл настроек
```
.env
```

##### 7. Запустить миграции
```
php artisan migrate
```

##### 8. Создать ключи шифрования
```
php artisan key:generate
```

##### 9. Добавить фейковых данных (можно использовать несколько раз):
```
php artisan db:seed
```

##### 10. Enjoy!

