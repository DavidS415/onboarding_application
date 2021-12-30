# onboarding_application
A PHP/LAMP stack application for new hire onboarding

Quick set up requirements:

1. Install Apache, MySQL/MariaDB, and PHP (You can use PHPMYADMIN as well)

2. Use the SQL query saved as new_obrfs.sql in scripts folder to create required database, tables, and user/password in the config file (default user/password can be updated later)

3. Move the onboarding_application folder to var/www/html and visit "localhost/onboarding_application" or "yourip/onboarding_application" to confirm application installation on local enviornment

4. Register an new user to become an admin by submitting a registration form with username and password via the registration page

5. Via command line or phpmyadmin change the "role" of the user you just created to "admin" (update new_users set role = 'admin' where id = 1;)

6. Move the record from the admin user you just created from new_users to users (INSERT INTO users SELECT * FROM new_users WHERE role = 'admin'; DELETE FROM new_users WHERE role = 'admin';)

Application should not be configured on local enviornmet, follow and steps you would for Apache configuration for public network
