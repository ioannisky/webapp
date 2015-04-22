# webapp
## Installation of the demo app

* Put the application directory on the apache root folder. You could use a symbolic link if you like. For the rest of the example I will assume that the application is in the directory "demoapp" accessible at the URL: http://localhost/demoapp
* Create a new mysql database and load the database found in application/demoapp/sql/demoapp.sql
* Edit the application/demoapp/config.php and change the database settings. Leave the $db['name']="demoapp"; unchanged since it is used to create the database resource that is used by the objects.
* Change the $config['base']="localhost/demoapp/"; with the address that your application can be accessed.
* The application should be accessible by the above URL.

