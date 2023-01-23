# LaravelSimpleCMS
A simple Content Management System (CMS) prototype made with Laravel .

# WARNING: This repository is still under development.
### This readme file will be updated as the project progresses.


# Minimum requirements
Laravel 9.x requires a minimum PHP version of 8.0.

## Project installation

**Obtaining the source code**

Considering that git is already installed on your machine and using the terminal run the commands below:

`` $ git clone https://github.com/aroldosantos/LaravelSimpleCMS.git ``

`` $ cd LaravelSimpleCMS ``

You can also just download the zip and unzip it wherever you want.

In the ``LaravelSimpleCMS`` folder, run the commands below:

`` $ composer install ``

Make a copy of the ``.env.example`` file and rename it to just ``.env``

Run the command:

`` $ php artisan key:generate ``

create a MySQL database.

Open the ``.env`` and look for the entries:


```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Replace entries with your settings

My settings looked something like this

```
DDB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_simple_cms
DB_USERNAME=root
DB_PASSWORD=
```
 
In the ``LaravelSimpleCMS`` folder, run the commands below:

``$ php artisan migrate --seed``

This command will both create tables in the database and populate these tables with fake data.

Run the commands below:

`` $ npm install``

`` $ npm run build``


Start the server with the command:

``$ php artisan serve``

A php server startup prompt will appear with something like:

`` INFO  Server running on [http://127.0.0.1:8000]. ``


## Accessing the administrative area

- URL: ``http://127.0.0.1:8000/login``
- User: (Any email from users table)
- Password: ``password``


