# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start LARAVEL VERSION (8.6.9).

Clone the repository

    git clone https://github.com/lalejandrors/hexa_products_app.git

Switch to the repo folder

    cd hexa_products_app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000 or http://127.0.0.1:8000

----------