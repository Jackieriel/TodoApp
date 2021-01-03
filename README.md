# TodoApp
A simple todo app written with Laravel 7.0 to demonstrate CRUD operation.

## Installation

Clone the repository-
```
git clone https://github.com/Jackieriel/TodoApp.git
```

Then cd into the folder with this command-
```
cd TodoApp
```

Then initialize a composer install
```
composer install
```

Next create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `toDoApp` and then do a database migration using this command-
```
php artisan migrate
```

Finally generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

## Having problem running the app?

If you have any problem running the App please contact me +2348131327382

Follow me up on twitter https://twitter.com/jackieriel1

## Screenshot

![Landing Page](/screenshots/1.png)


