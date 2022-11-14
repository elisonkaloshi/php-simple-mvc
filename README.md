# php-simple-mvc
PHP simple mvc

## About the project

`The project is a model view controller design pattern and is made from scratch using php programming language combined with composer`

`I created a simple crud in this project to demonstrate how to get and manipulate data easily.`

`The project is designed to be expanded easily by adding other entities on it very easily.`

### Installation

`composer i`

`composer dump-autoload`

## Usage

### Env file

`1. Create a copy of the .env.example file: copy .env.example .env`

`2. Add your database configuration here`

### Create new table

`1. Create a new class inside the database/migrations folder`

`2. The class should contain table name and attributes (see CreateMovieTable as example)`

### Add the model

`1. Add a new class inside the app/Models folder`

`2. The new model should extend BaseModel class and add attributes and table on it (See Movie Model as example)`

### Run Migration

`1. chmod +x command.sh`

`2. ./command.sh -m {TableClassName}`

`3. Example: ./command.sh -m CreateMoviesTable`


### Add routes

`1. Add the new routes in the routes/main.php`

`2. In this file you need to specify the route name, controller and method`

### Add Controller

`1. Create controller class inside app/Controllers folder`

`2. There add the method and the logic for the method.`

### Add views

`1. Add a new view in the resources/views/`
### Run project

`./command.sh -s 9999`


