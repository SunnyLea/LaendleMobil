# LaendleMobil

LändleMobil

Objective

To promote mobility in rural areas by means of a user-friendly application (environmental awareness, cost savings).

Documentation

This web-application is used to find, offer and book carpooling opportunities for short distances.


Technologies

This web-application uses the following technology stack:
-	HTML, CSS, Javascript
-	Frameworks (client-side): Bootstrap
-	PHP
-	Apache Webserver
-	phpMyAdmin


Preconditions and Installation

The following preconditions are required to run this application:
- MySQL server running on localhost port 3306 with username root and no password
-	install XAMPP

  o	visit https://www.apachefriends.org/de/download.html
  
  o	download corresponding version
  
  o	tick checkboxes at
  
    	Apache
    
    	MySQL
    
    	PHP
    
    	phpMyAdmin

-	set up database
  
  o	open phpMyAdmin (XAMPP -> MySQL -> Admin)
  
  o	create a database with the name “laendlemobil”
  
  o	import file “laendlemobil.sql”


Installation steps:

-	Check out this repository

-	Adapt access paths in XAMPP
  
  o	Open XAMPP Control Panel
  
  o	Open “Apache (httpd.conf)” (XAMPP -> Apache -> Konfig)
    Search for htdocs: insert the location of this repository (twice; path must end with Laendlemobil/WebContent)
  
  o	Open “Apache (httpd-xampp.conf)” (XAMPP -> Apache -> Konfig)
    Search for htdocs: insert the location of this repository (path must end with Laendlemobil/WebContent)

-	Open any browser

-	Visit http://localhost/index.php
