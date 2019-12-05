<html>

<head>
</head>

<body>
    <?php
        // Errors nicht unterdrücken
        error_reporting(0);

        // Zeitzone festlegen
        date_default_timezone_set('Europe/Berlin');

        // Verbindungsaufbau zu Offline-Datenbank
        $db = new mysqli('localhost', 'root', '', 'laendlemobil') or die('Could not connect to server.');

        // falls wir je zwischen Online- und Offline-Zugang wechseln
        /* Server-Zugänge integrieren
        if ( $_SERVER['SERVER_NAME'] == 'localhost')
        {
            // Offline-Zugang
            $db = new mysqli('localhost', 'root', '', 'laendlemobil');
        }
        else
        {
            // Online-Zugang -> brauchen wir nicht?
            // $db = new mysqli('...');
        }
        */

        // UTF8 festlegen
        $db->set_charset('utf8');

        
    ?>
</body>

</html>