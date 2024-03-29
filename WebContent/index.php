<?php  
    require_once('db.php');

        $abfahrtsort = $_GET['abfahrtsort'];
        $ankunftsort = $_GET['ankunftsort'];
        $datum = $_GET['datum'];
        $zeitraum = $_GET['zeitraum'];

    $sql = "SELECT DISTINCT * FROM drives WHERE abfahrtsort='$abfahrtsort'
    AND ankunftsort='$ankunftsort' AND datum='$datum' AND 
    zeitraum='$zeitraum' AND freieSitzplaetze > 0";

    if ($erg = $db->query($sql)) {
        while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
        }
    }
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
        <img src="LogoWEBFertigRichtig.png" style="width: 20%;height: 20%;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="Fahrt_anbieten.html">Fahrt anbieten</a>
                <a class="nav-item nav-link active" href="aboutUs.html">Über uns</a>
                <a class="nav-item nav-link active" href="imprint.html">Impressum</a>
            </div>
        </div>
    </nav> 
    
    <div class="grid-container">
        <div class="show"></div>
        <div class="content">

            <br />
            <div class="hervorhebung">
                <p>
                    <h1>Fahrt suchen</h1>
                </p>
            </div>
            <br />

            <section>
                <form method="get">
                    <table id="table1">
                        <tr>
                            <td style="font-size: 130%">
                                Abfahrtsort: 
                            </td>
                            <td>
                                <input id="seekedStart" type="text" name="abfahrtsort" style="font-size: 130%;"></input>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 130%">
                                Ankunftsort: 
                            </td>
                            <td>
                                <input id="seekedDestination" type="text" name="ankunftsort" style="font-size: 130%;"></input>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 130%">
                                Datum: 
                            </td>
                            <td>
                                <input id="seekedDate" type="date" name="datum" style="font-size: 130%;"></input>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 130%">
                                Zeitraum: 
                            </td>
                            <td>
                                <select id="seekedTime" name="zeitraum">
                                    <option style="font-size: 95%;">Bitte auswählen ...</option>
                                    <option style="font-size: 95%;">vor 7 Uhr</option>
                                    <option style="font-size: 95%;">7 bis 9 Uhr</option>
                                    <option style="font-size: 95%;">9 bis 11 Uhr</option>
                                    <option style="font-size: 95%;">11 bis 13 Uhr</option>
                                    <option style="font-size: 95%;">13 bis 15 Uhr</option>
                                    <option style="font-size: 95%;">15 bis 17 Uhr</option>
                                    <option style="font-size: 95%;">17 bis 19 Uhr</option>
                                    <option style="font-size: 95%;">19 bis 21 Uhr</option>
                                    <option style="font-size: 95%;">nach 21 Uhr</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" value="Fahrt suchen" onclick="checkEntriesStart()" 
                     style="font-size: 95%; border-color: orange; float: left;">
                    <br />
                    <br />
                </form>
            </section>

            <br />
            <section>
                <div data-role="page" id="drives" data-theme="b">
                    <div data-role="main" class="ui-content">
                        <h1 id="h1gefundeneFahrten">
                            Gefundene Fahrten
                        </h1>
                        <br />
                        <form method="get">
                            <table id="gefundeneFahrten" data-role="table" class="ui-responsive"
                             data-mode="columntoggle" data-column-btn-text="Spalten" >
                                <thead>
                                    <tr>
                                        <th>Fahrt-ID</th>
                                        <th>Datum</th>
                                        <th>Uhrzeit</th>
                                        <th>Anbieter</th>
                                        <th>Start</th>
                                        <th>Ziel</th>
                                        <th>Freie Plätze</th>
                                        <th>Preis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php           
                                    foreach ($daten as $inhalt) {
                                    ?>
                                    <tr>
                                        <td><?php echo $inhalt->fahrt_id; ?></td>
                                        <td>
                                            <?php 
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
                                        <td><?php echo $inhalt->preis; ?>€</td>
                                        <td>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>           
                </div>
                    
            </section>
                <button type="button" id="open-dialog"  style="font-size: 95%; border-color: orange;">
                    Fahrt buchen
                </button>
                <dialog role="dialog" aria-labelledby="dialog-heading">	
                    <button id="close-dialog" style="font-size: 95%; border-color: orange; 
                        height: 100%; width: 30%; float: right;">
                        Schließen
                    </button>    
                    <h1 id="dialog-heading">
                        Buchung
                    </h1>
                    <br />
                    <table>
                        <tr>
                            <td>
                                Fahrt-ID: 
                            </td>
                            <td>
                                <input id="fahrt_id" type="number" min="1" name="fahrt_id" style="font-size: 95%;"></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                E-Mail: 
                            </td>
                            <td>
                                <input id="email_buchung" type="email" name="email_buchung" style="font-size: 95%;"></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name: 
                            </td>
                            <td>
                                <input id="name_buchung" type="text" name="name_buchung" style="font-size: 95%;"></input>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="button" onclick="postBuchung()" value="Buchen" 
                    style="font-size: 95%; border-color: orange; height: 100%; width: 100%;" ></input>
                    <br />
                </dialog>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="functions.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
                        
    <script type="text/javascript">

    // function loadTable() {
    // var seekedStart = $("#seekedStart");
    // var seekedDestination = $("#seekedDestination");
    // var seekedDate = $("#seekedDate");
    // var seekedTime = $("#seekedTime");

    // if (isNotEmptyLog(seekedStart) && isNotEmptyLog(seekedDestination) && isNotEmptyLog(seekedDate) && isNotEmptyLog(seekedTime)) {
    //     $.ajax({
    //         url: "getData.php",
    //         method: 'GET',
    //         data: {
    //             seekedStart: seekedStart.val(),
    //             seekedDestination: seekedDestination.val(),
    //             seekedDate: seekedDate.val(),
    //             seekedTime: seekedTime.val()
    //         },
    //         success: function(response){
    //             // showTable();
    //             let foundDrive = document.getElementById("gefundeneFahrten");
    //             foundDrive.style.display='block'; 
    //             let h1foundDrive = document.getElementById("h1gefundeneFahrten");
    //             foundDrive.style.display='block'; 
    //         }
    //     });
    // }
    // }

    // start();

    //  function start(){
    //  let foundDrive = document.getElementById("gefundeneFahrten");
    //  foundDrive.style.display='none'; 
    //  let h1foundDrive = document.getElementById("h1gefundeneFahrten");
    //  h1foundDrive.style.display='none'; 
    //  //let open-dialog = document.getElementById("open-dialog");
    //  //open-dialog.style.display='none';
    //  }

    //  function showTable() {
    //  let foundDrive = document.getElementById("gefundeneFahrten");
    //  foundDrive.style.display='block'; 
    //  let h1foundDrive = document.getElementById("h1gefundeneFahrten");
    //  foundDrive.style.display='block'; 
    //  //let open-dialog = document.getElementById("open-dialog");
    //  //open-dialog.style.display='block';
    //  }

    function checkEntriesStart(){
    let noInput = false;
    // let noFutureDate = false;
    
    let seekedStart = $("#seekedStart");
    let seekedDestination = $("#seekedDestination");
    let seekedDate = $("#seekedDate");

   if(seekedStart.value == "" || seekedDestination.value == "" || seekedDate == ""){
       noInput = true;
   }
   
   let select = document.getElementById('seekedTime');
   if(select.value == "Bitte auswählen ..."){
       noInput = true;
   }

   let today = new Date();
   let givenDate = document.getElementById('seekedDate');
   let givenDateString = givenDate.value;
   let givenDateArray = givenDateString.split('-');
   let givenDateFinal = new Date(givenDateArray[0], givenDateArray[1] - 1, givenDateArray[2]);

if (givenDateFinal.getTime() < today.getTime()) {
    // noFutureDate = true;
    alert("Bitte Datum in der Zukunft angeben");
            }
    // if(!noInput && !noFutureDate){
    //    showTable();
    // }
    if(noInput){
        alert("Bitte Daten eingeben");
   }
}

function postBuchung(){

    var fahrt_id = $("#fahrt_id");
    var email_buchung = $("#email_buchung");
    var name_buchung = $("#name_buchung");

    if (isNotEmptyLog(fahrt_id) && isNotEmptyLog(email_buchung) && isNotEmptyLog(name_buchung)) {

        $.ajax({

            url: 'sendBuchung.php',
            method: 'POST',
            dataType: 'json',
            data: {
                
                fahrt_id: fahrt_id.val(),
                email_buchung: email_buchung.val(),
                name_buchung: name_buchung.val()

            }, success: function (response) {

                if (response.status == "success"){
                alert('Buchung erfolgreich!');
                window.location.href = "index.php";
                }

                if (response.status == "failure")
                alert('ERROR');

                if (response.status == "booked_out")
                alert('Fahrt bereits ausgebucht!');

                if (response.status == "invalidID")
                alert('Ungültige ID!');
            }
        });
    }
}


function isNotEmptyLog(caller) {

    if (caller.val() == "") {
        alert("Bitte Daten eingeben");
        caller.css('border', '2px solid red');

        return false;
    } else
        caller.css('border', '');

    return true;
} 
 


document.querySelector('#open-dialog').addEventListener('click', toggleDialog); 
  function toggleDialog(){ 
      let dialog = document.querySelector('dialog'),
          closebutton = document.getElementById('close-dialog'),
          pagebackground = document.querySelector('body');
              
      if (!dialog.hasAttribute('open')) {
          dialog.setAttribute('open','open');
          closebutton.focus();
          closebutton.addEventListener('click', toggleDialog);
          var div = document.createElement('div');
          div.id = 'backdrop';
          document.body.appendChild(div);
      }
      else {		
          dialog.removeAttribute('open');  
          var div = document.querySelector('#backdrop');
          div.parentNode.removeChild(div);
          lastFocus.focus();
        
      }
  }

    </script>

    </body>


</html>