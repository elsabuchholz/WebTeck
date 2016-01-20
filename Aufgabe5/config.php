<?php

//set timezone
date_default_timezone_set('Europe/Berlin');

//site address local in DIR setzten der Url von der Anwendung
define('DIR','http://mvc.local/');

//site address studiserver
//define('DIR','http://studi.f4.htw-berlin.de/~s0544180/Aufgabe5/');

define('DOCROOT', dirname(__FILE__));

// Credentials for the local server datenbanken
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','products');
define('DB_USER','root');
define('DB_PASS','');

// Credentials for the HTW server
// define('DB_HOST','db.f4.htw-berlin.de');
// define('DB_NAME','_s0544180__products');
// define('DB_USER','s0544180');
// define('DB_PASS','WebTeckk');

//set prefix for sessions hilft sessionkonflikte zu vermeiden mit helper class
define('SESSION_PREFIX','splendr_');

//optionall create a constant for the name of the site
define('SITETITLE','Splendr');