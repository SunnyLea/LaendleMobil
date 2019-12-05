<?php  
    require_once('db.php');

        $abfahrtsort = $_GET['abfahrtsort'];
        $ankunftsort = $_GET['ankunftsort'];
        $datum = $_GET['datum'];
        $zeitraum = $_GET['zeitraum'];

    // echo "<h1> Datenbank auslesen um ". date("H:i:s") . "</h1>";

    $sql = "SELECT DISTINCT * FROM drives WHERE abfahrtsort='$abfahrtsort'
    AND ankunftsort='$ankunftsort' AND datum='$datum' AND 
    zeitraum='$zeitraum'";

    if ($erg = $db->query($sql)) {
        while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
        }
    }
    //echo '<pre>';
    //    print_r($daten);
    //   exit;

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css-grid.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <title>Ländlemobil</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;

        }

        input {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }

        select {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }

        button {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 120%;
        }
        dialog {
        display: none;
        position: relative;
        z-index:1002;

        }

        dialog[open="open"] {
         display: block;
        }

        @media (min-width: 30em) { 
         dialog {
         width: 20em; 
        }
        }
        dialog::backdrop, #backdrop {      
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);    
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--<a class="navbar-brand" href="#">Menü</a>-->
        
        <img src="LogoWEBFertigRichtig.png" style="width: 20%;height: 20%;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="Fahrt_anbieten.html">Fahrt anbieten</a>
                <a class="nav-item nav-link active" href="aboutUs.html">Über uns</a>
                <a class="nav-item nav-link active" href="imprint.html">Impressum</a>
            </div>
        </div>
    </nav>

    <div class="fullscreen">
        <div class="grid-container">


            <div class="content">
                <br />
                <h2>Fahrt suchen</h2>
                <section>
                    <form action="index.php" method="get">
                    <table id="table">
                        <tr>
                            <td>Abfahrtsort: </td>
                            <td><input id="seekedStart" type="text" name="abfahrtsort"></input></td>
                        </tr>
                        <tr>
                            <td>Ankunftsort: </td>
                            <td><input id="seekedDestination" type="text" name="ankunftsort"></input></td>
                        </tr>
                        <tr>
                            <td>Datum: </td>
                            <td><input id="seekedDate" type="date" name="datum"></input></td>
                        </tr>
                        <tr>
                            <td>Zeitraum: </td>
                            <td>
                                <select id="seekedTime" name="zeitraum">
                                    <option>Bitte auswählen ...</option>
                                    <option>vor 7.00 Uhr</option>
                                    <option>zwischen 7.00 und 9.00 Uhr</option>
                                    <option>zwischen 9.00 und 11.00 Uhr</option>
                                    <option>zwischen 11.00 und 13.00 Uhr</option>
                                    <option>zwischen 13.00 und 15.00 Uhr</option>
                                    <option>zwischen 15.00 und 17.00 Uhr</option>
                                    <option>zwischen 17.00 und 19.00 Uhr</option>
                                    <option>zwischen 19.00 und 21.00 Uhr</option>
                                    <option>nach 21.00 Uhr</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" value="Fahrt suchen" onclick="checkEntriesStart()">
                    <!--<button onclick="checkEntriesStart()">Fahrt suchen</button>-->
                    </form>
                </section>

                <br />

                <section>
                        <div data-role="page" id="drives" data-theme="b">
                                <div data-role="main" class="ui-content">
                              <h1>Gefundene Fahrten</h1>
                           <form action="buchung.php" method="get">
                           <table id="gefundeneFahrten" data-role="table" class="ui-responsive" data-mode="columntoggle" data-column-btn-text="Spalten" >
                               <thead>
                                   <tr>
                                       <th>Datum</th>
                                       <th>Uhrzeit</th>
                                       <th>Anbieter</th>
                                       <th>Abfahrtsort</th>
                                       <th>Ankunftsort</th>
                                       <th>Freie Sitzplätze</th>
                                       <th>Preis</th>
                                   </tr>
                               </thead>
                               <tbody>
                               <?php
                               
                               foreach ($daten as $inhalt) {
                                 //  print_r($daten);
                               ?>
                                   <tr>
                                       <td>
                                           <?php 
                                           // echo $inhalt->datum; 
                                           //print_r($daten->datum);
                                           echo date("d.m.Y", strtotime($inhalt->datum));
                                           ?>
                                       </td>
                                       <td><?php echo $inhalt->abfahrtszeit; ?></td>
                                       <td>
                                           <?php echo $inhalt->nachname; 
                                                 echo " ";
                                                 echo $inhalt->vorname; ?>
                                       </td>
                                       <td><?php echo $inhalt->abfahrtsort; ?></td>
                                       <td><?php echo $inhalt->ankunftsort; ?></td>
                                       <td><?php echo $inhalt->freieSitzplaetze; ?></td>
                                       <td><?php echo $inhalt->preis; ?></td>
                                       <td>
                                       </td>
                                   </tr>
                               </form>
                               <?php
                               }
                           
                               ?>
                               </tbody>
                               </table>
           
               </div>
                           <br />
                       </div>
                       
                </section>
                <button id="open-dialog">Zeige die Dialog-Box</button>
                                <dialog role="dialog" aria-labelledby="dialog-heading">
                                <button id="close-dialog">Schließen</button>	
                                <h2 id="dialog-heading">Info</h2>
                                </dialog>
                <br />

            </div>
        </div>

    </div>

    <script type="text/javascript" src="functions.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>



</body>

</html>