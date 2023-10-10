<h1>Password Generator</h1>

<h2>This app is created to help users to keep their security level high.</h2>

It looks like usual web-service.
- While using user has to sigh up and log in to get full access to app.
- It proposes random passwords based by number of inputted chars by user.
- It is based by generating password from random symbols. This type of password has the best security level and is much more uncrackable.

## How to use
- Place project in work directory (Recommendation: Place it in directory of Host< such as OpenServer or XAMPP);
- First, review project files;
- Check file "resources/_config.php" and configure DataBase connection;

### If you configured everything right - Try to run the application</h3> 

## Main part written with:

- PHP (v8.1)
- JS
- HTML & CSS
- MySQL (You can choose any others, but requests to DB in code may be changed)

## Pages

It has such variety of pages:
- Log in
- Sign up (Registration)
- About
- Profile
- Generate Password
- Review user's Saved Passwords

### Generation password ()

- User inputs number of chars for generating password
- App detects this number
- Starts generating random password
- Outputs with button " Save Password " to database
- If User submits saving it redirects to page with success saving

### Saved passwords

Outputs random passwords that user saved to DB.

It has ability "Delete" if user wants to delete from Saved.

### Project files:

- auth:
- -  login.php;
- -  logout.php;
- -  profile.php
- css:
- - styles.css
- JS:
- - script.js
- password:
- - generate.php;
- - generated.php;
- - saved_passwords.php
- resources:
- - _config.php;
- - create_table.sql;
- - header.php
- index.php
- README.md
