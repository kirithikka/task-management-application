Steps:
Run the following commands:
    -- composer install
    -- npm install
    -- php artisan migrate

Create .env file in the root of the application. Copy the contents from .env.example to .env and modify the database related constants shown below:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=8889
    DB_DATABASE=task_management_application    #name of the table
    DB_USERNAME=root
    DB_PASSWORD=root


Testing:
Similarly, create .env.testing file for testing. Also, create a new DB for running automated tests. Use this DB name in the DB_DATABASE constant.


To run the server:
    -- php artisan serve
    -- npm run dev


Details:
-- Laravel jetstream for authentication
-- Added a new field type in users table.
-- Laravel inertia used


Next steps:
-- Input Validations in controller APIs
-- Edit UI and API, marking a task as completed - yet to be built
-- API versioning using middleware
-- Filter by tasks
-- Improving the look of the UI

and all bonus tasks
