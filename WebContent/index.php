<?php  
    require_once('db.php');

        $abfahrtsort = $_GET['abfahrtsort'];
        $ankunftsort = $_GET['ankunftsort'];
        $datum = $_GET['datum'];
        $zeitraum = $_GET['zeitraum'];

    // echo "<h1> Datenbank auslesen um ". date("H:i:s") . "</h1>";

    $sql = "SELECT DISTINCT * FROM drives WHERE abfahrtsort='$abfahrtsort'
    AND ankunftsort='$ankunftsort' AND datum='$datum' AND 
    zeitraum='$zeitraum' AND freieSitzplaetze > 0";

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
                <h2>Fahrt suchen</h2>
                <section>
                    <!--<form action="index.php" method="get">-->
                    <form method="get">
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
                    <input type="submit" value="Fahrt suchen" onclick="checkEntriesStart()" onclick="showTable()">
                    <!--<button onclick="checkEntriesStart()" onclick="showTable()">Fahrt suchen</button>-->
                    </form>
                </section>

                <br />

                <section>
                        <div data-role="page" id="drives" data-theme="b">
                                <div data-role="main" class="ui-content">
                              <h1 id="h1gefundeneFahrten">Gefundene Fahrten</h1>
                           <form method="get">
                     <!--      <form action="buchung.php" method="get"> -->
                           <table id="gefundeneFahrten" data-role="table" class="ui-responsive" data-mode="columntoggle" data-column-btn-text="Spalten" >
                               <thead>
                                   <tr>
                                       <th>Fahrt-ID</th>
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
                                       <td><?php echo $inhalt->fahrt_id; ?></td>
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
                       
                </section>
                <button type="button" id="openDialog">Fahrt buchen</button>
                <dialog role="dialog" aria-labelledby="dialog-heading">	
                    <h2 id="dialog-heading">Buchung</h2>
                    <button id="close-dialog">Schließen</button>
                    <form  method="POST">
                    <table>
                        <tr>
                            <td>Fahrt-ID: </td>
                            <td><input id="fahrt_id" type="number" name="fahrt_id"></input></td>
                        </tr>
                        <tr>
                            <td>E-Mail: </td>
                            <td><input id="email_buchung" type="email" name="email_buchung"></input></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td><input id="name_buchung" type="text" name="name_buchung"></input></td>
                        </tr>
                    </table>
                    <br />
                   <!-- <input type="submit" name="submit" value="Buchen"  id="close-dialog"> -->
                   <input type="button" onclick="postBuchung()" id="close-dialog" Value="Buchen" ></input>
                    </form>  
                 </dialog>
                <br />

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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>




                        
    <script type="text/javascript">

     start();
     function start(){
     let foundDrive = document.getElementById("gefundeneFahrten");
     foundDrive.style.display='none'; 
     let h1foundDrive = document.getElementById("h1gefundeneFahrten");
     h1foundDrive.style.display='none'; 
     let openDialog = document.getElementById("openDialog");
     openDialog.style.display='none';
     }

     function showTable() {
     let foundDrive = document.getElementById("gefundeneFahrten");
     foundDrive.style.display='block'; 
     let h1foundDrive = document.getElementById("h1gefundeneFahrten");
     foundDrive.style.display='block'; 
     let openDialog = document.getElementById("openDialog");
     openDialog.style.display='block';
     }

    function checkEntriesStart(){
    // let inputs = document.getElementsByTagName('input');
    let noInput = false;

    let seekedStart = $("#seekedStart");
    let seekedDestination = $("#seekedDestination");
    let seekedDate = $("#seekedDate");

//     for(let i = 0; i < inputs.length; i++){
//        if(inputs[i].value == ""){
//            noInput = true;
//        }
//    }
   if(seekedStart.value == "" && seekedDestination.value == "" && seekedDate == ""){
       noInput = true;
   }
   let select = document.getElementById('seekedTime');
   if(select.value == "Bitte auswählen ..."){
       noInput = true;
   }
    if(!noInput){
       showTable();
    }
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

                if (response.status == "success")
                alert('Buchung erfolgreich!');
                window.location.href = "index.php";

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
          
          // show the dialog 
          dialog.setAttribute('open','open');
          // after displaying the dialog, focus the closebutton inside it
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
  //   src="https://cdn.jsdelivr.net/npm/sweetalert2@9"
  }



  
    </script>
    



    </body>


</html>