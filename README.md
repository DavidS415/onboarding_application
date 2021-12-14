# onboarding_application
A PHP/LAMP stack application for new hire onboarding

Quick set up requirements:

1. Install Apache, MySQL/MariaDB, and PHP (You can use PHPMYADMIN as well)

2. Create a database called "oba" to host the data table (CREATE DATABASE oba;)

3. Use the SQL query saved as new_obrfs.sql in scripts folder to create required tables to store data

4. Move the onboarding_application folder to var/www/html and visit "localhost/onboarding_application" or "yourip/onboarding_application" to confirm application installation on local enviornment

5. Register an admin user by submitting a registration form with username and password for your admin user, then via command line or phpmyadmin change the "role" to "admin" and move the row from new_users to users

Application should not be configured on local enviornmet, follow and steps you would for Apache configuration for public network
