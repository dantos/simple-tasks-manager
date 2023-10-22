# Simple Task Manager

> About

STM is a platform used to show an example of a simple page made in laravel to handle tasks and their priority.

## Requirements
- PHP >= 8.1
- MySQL 5.7.* | MariaDB 10.6.*
- Laravel 10 (https://laravel.com/docs/10.x/deployment#server-requirements)
- Composer 2.2.3

## Installation

Once the project has been cloned, perform the following steps from the root directory:
- run `composer install`
- Copy the file 'example.env' and rename it to '.env'
- Create database in mysql and set the corresponding database name and credentials in the '.env' file
- run `php artisan key:generate`

Populate the database
- run `php artisan migrate:fresh --seed`

## Serve the project in your development environment

- run `php artisan serve`

## Go to the main page

http://localhost:8000