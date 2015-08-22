This is a sample app to demonstrate the use of data tables.


Specification

Below is a toy project we have used for this position before.  If I were doing this exercise, I would use Laravel, which is the framework we use in-house, but you do not have to.  Also, if you have a different stack of JS libraries you would like to use, please feel free to do so, we just don't want pure JS.
 
·         Create a database table of at least 1000 user rows with unique IDs.  First and last names can be random strings of varying length.  Two columns should be populated randomly from the sets {A, B, C, D, E, F} and {X, Y, Z} respectively.  So, there are 5 columns in the table.
·         Create a roles table with the values administrator, developer, user.  Primary key can be an integer or a string.  So, there could be one or two columns.
·         Create a role_user table with foreign keys to role and user for managing the many-to-many relationship between roles and users.  The role_user table will initially be empty.
·         Create a user management page with a table of users using DataTables.
o   Each column should be shown.
o   Clicking on a user ID or table row should bring up a modal that allows permissions to be set for a user.  jQuery should be used to handle the click event.  The user information should be pulled into the modal using Ajax.
 

Components:
Static page
Script
Application which feeds data to & from the database

