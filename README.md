# DESCRIPTION
You have been provided with drive link with some code skeleton here
It has the following
## MAIN FOLDER: UserAuth

### `index.php` 
  which is the landing page having links to register and sign in
### `dashboard.php` 
  is the landing page after successful login
### `config.php`
  this contains your database configurations for server(hostname), username, password and database(db).
  it also creates a connection to the database and returns it in case it was succesful, if not, it throws an error as a pop up to the screen
  your first task is to setup up your database credentials
## DIR(FOLDER): html>
  - #### `login.html` 
      which is the login page whose form actions is php/login.php
  - #### `register.html `
      which is register page whose form action is php/register.php
  - #### `resetpassword.html`
     which is the reset password page whose form action is php/reset.php
## DIR(FOLDER)php>
  - #### `action.php` 
    is a file that handle user interaction with the various forms, it calls the necessary functions based on the form the user is currently interacting with.
  - #### `userauth.php` 
  this file handles the main logic of the application, it container the loginUser(), registerUser(), reset(), getAll() and deleteaccount() functions

# TASK:
 With the provided code skeleton inside userAuthMySQL folder, your task is to complete the following files
- ## `database`
  Open your phpmyadmin and create a database called zuriphp.
  create a database called zuriphp.
  Create a table called Students with the following
   - ` Id`
   - `Full_names`
   - `Country`
   - `Email`,
   - `Gender`
  - `dob`
 - import the sql file called users.sql to have some initial users in your database for testing.
- ## `config.php` 
  setup your database credentials by specifying your servername(host), username(user), password and database name(db) 

- ## `registerUser()`
  this function should take the full names, email, password, country and store the data in a database table called Students . If it was successfully stored, the users should receive the message (“User Successfully registered”)
- ## `loginUser()`. 
  This file is meant to handle user login from the login form, the user inputs email and password from the form, you should check if the email and password provided match that which is in the database table and if they match, create a session and put the username inside and redirect the user to the dashboard, if it does not match, redirect the user back to the login page
- ## `reset()` 
  this Function is meant to update the user password, the data is received from resetpassword.html, it takes in the email and the new password and searches the database, if there is a match for the email, it should update the password field with the new data from the form, else, it should print out “User does not exist”
  logout.php this file is meant to destroy the user existing session and redirect to the login page 
- ## `getallUsers()` 
  this function get all the users from the database on display them on a table within ht function
- ## `deleteaccount()`
  this function to delete the user with the given id from the button on the front-end (the button name is ‘id’ you can access it within the post array when the button is pressed


