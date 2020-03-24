# Portfolio website
This website is a resume of Dragan Robert.

# Installation
- Make sure php7, composer and PostgreSQL is installed on the machine
- Clone the project
- Install all dependencies with ```composer install ```
- Create a database
- Create a .env file inside the project directory and fill with the right parameters
- Generate a key for the application with ```php artisan key:generate```
- Run migrations and seeds ```php artisan migrate --seed``` (only seeds run ```php artisan db:seed```)
- Install Laravel Passport ```php artisan passport:install```
- Storage link ```php artisan storage:link```
- Run the backend for the project with ```php artisan serve```
- ```npm install``` for setting up the front end
- ```npm run dev``` for compilling all front end scripts
- ```npm run watch``` for developing with auto compilling of the front end scripts