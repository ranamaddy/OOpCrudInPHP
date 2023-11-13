# PHP CRUD Application Using OOP
This is a simple CRUD (Create, Read, Update, Delete) application built with PHP and MySQL. It provides a basic framework for performing basic database operations.

# Features
Object oriented MySQLi database class for clean abstraction
Bootstrap frontend for simple styling
Basic pages for listing, adding, editing and deleting records
Validation to prevent inserting duplicate users
Error handling and messaging for failed queries
Simple MVC structure separating business logic and presentation
Usage
The main entry point is index.php which lists all records. From there you can navigate to:

insert.php to insert new records
userupdate.php to update existing records
userdelete.php to remove records
The Dbclass2.php class handles all database interactions and abstracts them into simple CRUD methods.

The frontend pages handle form submission and redirecting on success/failure.

# Installation
Import the attached SQL file into a new database
Update Db.php with your database credentials
Ensure your web server has write permissions to the project directory
Navigate to index.php to view the application
Contributing
Pull requests and issues are welcome for enhancements or bug fixes. Areas for improvement include:

# Input validation and sanitization for security
Pagination of results
Image/file uploading
User authentication and authorization
Exception handling
