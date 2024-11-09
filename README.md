# Contacts-Database-MySQL-and-PHP

Contacts Database is just a way to manage your personal or professional contacts with a Responsive and Professional User Interface

## Table of Contents

 1. Database and Table setup
 2. Create a web form
 3. Process the web form – to store the input into Database (using PHP and mySQL Query)
 4. Display the data from the database table on the PHP page

## Create a database, table, fields in PHPMyAdmin using xampp server or wamp server

1. Run WAMP/XAMPP.
 2. Open phpMyAdmin in your browser.
 myaddressbook
 3. Create a database named myaddressbook. Similar e.g like below V<br><br>
 **contacts**<br>
    id(primary key, INT, auto increment)<br>
    contact_name (VARCHAR, 255)<br>
    contact_phone (VARCHAR, 50)<br>
    contact_email (VARCHAR, 255)<br>
    contact_address (TEXT)<br>
    contact_gender (VARCHAR, 10)<br>
    contact_relationship (VARCHAR, 10)<br>
    contact_dob (DATE)<br>

 4. Within the myaddressbook database, create a table named contacts.
 5. Add the table fields as shown in the diagram above