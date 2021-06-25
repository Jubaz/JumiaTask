## Single Page Application For Customers Phones Using Laravel and Vue Js 

## How To Install

- git clone git@github.com:abdomf/JumiaTask.git 
- cd JumiaTask
- composer install
- cp .env.example .env 
- configure your database in .env
- php artisan migrate --seed
- php artisan key:generate
- php artisan serve 
- visit http://localhost:8000/ or http://localhost:8000/customers in your browser.

## Tests

You can run php artisan test

## Tests List :
- it can get all customers
- it can filter customers by country
- it can filter by valid phones
- it can filter by not valid phones
- it can get all customers in case of empty filters sent
- it can get all customers in case of wrong filter sent
- it can view customers
- it return customers data as json
