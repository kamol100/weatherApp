
## Weather app

- change .env file, connect database, QUEUE_CONNECTION=database

Please run the flowing command to run the project
- composer install 
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan weather:update ( possible to set limit ex: "weather:update 100" will run 100 job and pull 100 cities data)
- php artisan queue:work

- php artisan serve
- npm install
- npm run dev

# Note: 127.0.0.1:8000 is required to run frontend!

