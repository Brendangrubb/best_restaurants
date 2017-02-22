# Best Restaurants

#### By Ash Laidlaw and Brendan Grubb
&nbsp;

## Description/Goals

Create a website where users can add their favorite restaurants by the type of cuisine they offer. Make sure you have passing tests for all of your methods before you integrate them into your Silex app.

* Add a Cuisine class. Build out all CRUD functionality (Create, Read, Update, Delete) for this class. Remember that "Read" means to view a particular cuisine and to list out all of the cuisines.
* Add a Restaurant class. Build out all CRUD functionality for this class.
* Add properties other than name to your Restaurant class, so that you can display descriptive information about the restaurants.
* Make the connection between a cuisine and a restaurant in the database. A cuisine can have many restaurants, but a restaurant can only be attached to one cuisine. Hint: create a cuisine_id in one of your classes.
* Allow a user to search for all of a cuisine's restaurants.
* If you make it this far, great job! You have practiced everything we wanted you to practice. If you have time, go ahead and tackle the next few features.

Extra

* Now your application allows for users to review restaurants. Build out a Review class and make the relationship in the database, so that a restaurant has many reviews. Pretend that the users who are reviewing the website are different from the user who added the restaurant.
* Display all of the reviews at the bottom of the restaurant's page.
&nbsp;

## Specifications
#### _Initial Setup_
* Silex and Twig Dependencies
* Initial Silex framework

#### _Phase 1_
* Add Restaurant class
* Test Restaurant methods
* Add MySQL database for persistent storage
* Modify Restaurant class to use DB
* Add Restaurant functionality to routes
* Add Twig forms


|Behavior|Input|Output|
|--------|-----|------|
| Program has functionality to add a restaurant to the database | "dots / $$ / SE" | same as input |
| Program has functionality to display all restaurants in databse | user clicks 'show all restaurants' | lists all restaurants in databse |
| Program has functionality to remove all restaurants from database | user clicks 'delete all restaurants' | no restaurants are listed on home page |
| Program has functionality to update a restaurant listing in database | "mi mero mole / $ / SW" | "mi mero mole / $$$ / SW" |
| Program has functionality to delete a single restaurant listing in database | "mi mero mole / $ / SE" | restaurant no longer listed on home page |

#### _Phase 2_
* Create a Contact class

|Behavior|Input|Output|
|--------|-----|------|

&nbsp;

## Setup/Installation Requirements
* See https://secure.php.net/ for details on installing _PHP_.  Note: PHP is typically already installed on Mac.
* See https://getcomposer.org/ for details on installing _composer_.
* See https://mamp.info/ for details on installing _MAMP_.
* Use MAMP `http://localhost:8888/phpmyadmin/` and `to_do.sql.zip` to import a `to_do` database.
* Use same MAMP website to copy to_do database to `to_do_test` database (if you would like to try PHPUnit tests).
* Use MAMP
* Clone project
* From project root, run > `composer install --prefer-source --no-interaction`
* To run PHPUnit tests from root > `vendor/bin/phpunit tests`
* From web folder in project, Start PHP > `php -S localhost:8000`
* In web browser open `localhost:8000`
&nbsp;

## Known Bugs
* No known bugs
&nbsp;

## Support and contact details
* No support
&nbsp;

## Technologies Used
* PHP
* MAMP
* mySQL
* Composer
* PHPUnit
* Silex
* Twig
* HTML
* CSS
* Bootstrap
* Git
&nbsp;

## Copyright (c)
* 2017 Ash Laidlaw and Brendan Grubb
&nbsp;

## License
* MIT
