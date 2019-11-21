<?php  
    require_once('db.php');

        $abfahrtsort = $_GET['abfahrtsort'];
        $ankunftsort = $_GET['ankunftsort'];
        $datum = $_GET['datum'];
        $zeitraum = $_GET['zeitraum'];

    echo "<h1> Datenbank auslesen um ". date("H:i:s") . "</h1>";

    $sql = "SELECT DISTINCT * FROM drives WHERE abfahrtsort='$abfahrtsort'
        AND ankunftsort='$ankunftsort' AND datum='$datum' AND 
        zeitraum='$zeitraum'";

    if ($erg = $db->query($sql)) {
        while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
        }
    }

?>