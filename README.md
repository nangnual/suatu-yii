CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=suatuyii',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

### Generate Table
  run 
  ``` database_creation.sql``` will create database and tables necessary

### Install dependencies with composer