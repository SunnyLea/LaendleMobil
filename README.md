# LaendleMobil

Ziel:    Mobilität in ländlichen Regionen mit Hilfe einer benutzerfreundlichen Anwendung fördern (Umweltgedanke, Kostenersparnis)

Grundfunktionalitäten:      Fahrten einstellen, nach ihnen suchen und buchen können!

Zusatzfunktionen:

  o Personen müssen Name und Mailadresse eingeben und werden per Mail benachrichtigt wenn man gebucht wurde oder gebucht hat
  
  o Mögliche Fahrten können eingegeben werden
  
  o Tägliche Fahrten wie der Weg zur Arbeit oder wöchentliche Fahrten wie der Weg zu Sport können eingestellt werden
   

--------------------------------------------------------
LändleMobil
Documentation
This web-application is used to find and offer carpooling opportunities for short distances.


Technologies
This web-application uses the following technology stack:
-	HTML, CSS, Javascript
-	Frameworks (client-side): Bootstrap
-	PHP
-	Apache Webserver
-	phpMyAdmin


Preconditions and Installation
The following preconditions are required to run this application:
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

(
Deutsch:
Preconditions
-	[XAMPP]
  o	https://www.apachefriends.org/de/download.html
  o	Entsprechende Version herunterladen
  o	Im XAMPP Installer Häkchen setzen bei 
    	Apache
    	MySQL
    	PHP
    	phpMyAdmin
    	…?
-	 [Datenbanktabellen]
  o	phpMyAdmin öffnen (XAMPP  MySQL  Admin)
  o	neue Datenbank mit dem Namen laendlemobil erstellen
  o	SQL-File laendlemobil.sql importieren

Installation steps:
-	Repository clonen
-	Zugriffspfade in XAMPP anpassen
  o	XAMPP Control Panel öffnen
  o	Bei Apache Konfig „Apache (httpd.conf)“ öffnen
    	Nach htdocs suchen
    	Zeile 252: Pfad zum Git-Ordner einfügen (muss auf LaendleMobil/WebContent enden)
    	Zeile 253: Pfad zum Git-Ordner einfügen 
    	Alle Slashs müssen so / sein
  o	Bei Apache Konfig „Apache (httpd-xampp.conf)“ öffnen
    	Zeile 66: Pfad zum Git-Ordner einfügen (muss auf LaendleMobil/WebContent enden)
-	Browser öffnen
-	http://localhost/index.php aufrufen
)
