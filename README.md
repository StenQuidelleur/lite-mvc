Simple MVC
Description
This repository is a lite PHP MVC structure from scratch.

For this one, just a simple example where users can choose one of their databases and see tables in it.

Steps
Clone the repo from Github.
Run composer install.
Create config/db.php from config/db.php.dist file and add your DB parameters. Don't delete the .dist file, it must be kept.
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');

Import database.sql in your SQL server, you can do it manually or use the migration.php script which will import a database.sql file.

Run the internal PHP webserver with php -S localhost:8000 -t public/. The option -t with public as parameter means your localhost will target the /public folder.

Go to localhost:8000 with your favorite browser.

From this starter kit, create your own web application.