###################
News blog.
###################

This project were assigned by the ClickItTech development team. In this blog
we were practicing our develoment skills with the php Framework CodeIgniter 3.1.0 , Bootstrap 4 alpha 3
and also jQuery/JavaScript.

**************************
Changelog and New Features
**************************

- August 1st 2016
Created and structured the database
Implemented the mailgun library with composer, and Bootstrap 4.
Views added: Home.

- August 2nd 2016
Modified the autoload.php on config.
Added the home page.
Added the database connection.
Added the libraries My_mailgun, database and session.
Added the helpers url, date.
Fixed the bootstrap 4 files.
Views added: Login, Register.
Models added: Login, Register.

- August 3rd 2016
Fixed the header and the home view, now we are using Bootstrap 4 instead of Bootstrap 3.
Views added: contact.
Models added: comment.
Fixed some issues on the controller home.
The Mailgun library now works correctly on the "contact us" view, we need more testing with sending e-mails with the comments function.
Fixed some databases issues, we're going to prepare the database for the migration to the online server with autodeploy.
Added some routing paths for a more structured view.
Fixed the validations of the login view.

*******************
Server Requirements
*******************
PHP version 5.6 or newer.
Percona Server for MySQL
