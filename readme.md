# Percentile Rank - Calculation Program
Scope: Student data is considered in comma-separated format where 
the columns are ID, name, and GPA. The program output will contain 
Id, student name, GPA and calculated percentile rank
                                                                     
Created by: Sundaram, 2017 
- Click on "Clone or Download" green button and then click on "Download Zip"                                          

## Contents:
- Laravel requirements
- Installation
- List of Important Files and Functions
	
## Laravel requirements
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer

## Installation
- Get project source code and go to project directory
- Open command prompt in project directory and run command `Composer install`
- Copy and save .env.example to .env
- From command prompt run command `php artisan key:generate`
- Run artisan server from command prompt `php artisan serve`
- Open url mentioned in command prompt
- To run phpunit, Run command `phpunit` from project directory.
  to run individual file you can run `phpunit filename`.

## List of Important Files and Functions

### data/
This directory contains data.csv file which will be input to data. Data is stored in comma seperated values in below format.
`id,studentname,score`

### src/
This folder contains repositories and interface used to write functions to read data from csv and calculate percentile.

### controller
controller is present in app/Http/Controllers/PercentileController.php, It calls repository functions and render result to views.

### Views
view is present in resources/views/percentile.blade.php. It is used to render results.

### Routes
Routes file is present in routes/web.php. It is used to navigate url to appropriate operation logic.

### Unit tests
Php unit test file is present in tests/Unit/PercentileRepositoryTest.php
