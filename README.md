## Become a Better Climber
Project created for easy to use Training Programs for climbing

### SET up from GIT

```bash
git clone git@github.com:User/repo.git 
cd repo
composer install
cp .env.example .env
```

Create a new DB inside your PhpMyAdmin.<br>
Create a new User for the connection.<br>
Change the following fields in the .env file: ``DB_DATABASE=dbname`` ``DB_USERNAME=dbuser`` ``DB_PASSWORD=dbpassword``. <br>

```bash
php artisan key:generate
php artisan config:clear
```

Initialize DB in local and create instances inside with faker

```bash
 php artisan migrate
 php artisan db:seed
```

### SET up per Altervista 

Per il db Modificare il file .env e caricarlo tramite FTP<br>

Usare InnoDB come engine e settare la dimensione delle stringhe ad unmassimo di 191 per retrocompatibilita mysql5.6<br>

Errore is_dir(): open_basedir restriction in effect.[Soluzione](http://forum.it.altervista.org/php-mysql-e-apache-htaccess/288179-laravel-problemi-relativi-path.html)<br>

Errore 500  [Soluzione](http://forum.it.altervista.org/php-mysql-e-apache-htaccess/282797-errore-500-installazione-laravel.html)<br>

Errore file .Zip    [Soluzione](http://forum.it.altervista.org/php-mysql-e-apache-htaccess/288176-laravel-caricamento-sito-impossibile.html)<br>
