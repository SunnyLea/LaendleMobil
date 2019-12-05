<html>

<head>
</head>

<body>
    <?php
        // Errors unterdrücken
        error_reporting(0);

        // Zeitzone festlegen
        date_default_timezone_set('Europe/Berlin');

        // Verbindungsaufbau zu Offline-Datenbank
        $db = new mysqli('localhost', 'root', '', 'laendlemobil') or die('Could not connect to server.');

        // UTF8 festlegen
        $db->set_charset('utf8');

        
    ?>
</body>

</html>