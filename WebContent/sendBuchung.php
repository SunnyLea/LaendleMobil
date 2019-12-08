<?php

$fahrt_id = $_POST['fahrt_id'];
$name = $_POST['name_buchung'];
$email = $_POST['email_buchung'];

$status = "failure";
$response = "Buchung nicht erfolgreich";

$con = mysqli_connect("localhost", "root", "", "Laendlemobil") or die("Could not connect to server.");

$abfrageID = "SELECT * FROM drives where fahrt_id = '".$fahrt_id."';";
$abfrageFreieSitzplaetze = "SELECT freieSitzplaetze FROM drives where fahrt_id = '".$fahrt_id."';";

$eintrag = "INSERT INTO BUCHUNGEN (fahrt_id, name, email) VALUES ('".$fahrt_id."','".$name."','".$email."');";
$ergebnis = mysqli_query($con, $abfrageID);
$count = mysqli_num_rows($ergebnis); 


if ($count == 1) {

  $result = mysqli_query($con, $abfrageFreieSitzplaetze);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $anzahlSitzplaetze = $row['freieSitzplaetze'];
//   $anzahlSitzplaetze = $anzahlSitzplaetze - 1;

  if ($anzahlSitzplaetze >= 1){
     $anzahlSitzplaetze = $anzahlSitzplaetze - 1;
     $updateSitzplaetze = "UPDATE drives SET freieSitzplaetze = '".$anzahlSitzplaetze."' where fahrt_id = '".$fahrt_id."';";
     if(mysqli_query($con, $updateSitzplaetze)){
        mysqli_query($con, $eintrag);
        $status = "success";
        $response =  "Buchung erfolgreich";
     }
  } else {
    $status = "booked_out";
    $response = "Fahrt ausgebucht!";
  }
}else {
    $status = "invalidID";
$response = "Ungültige ID!";
}

exit(json_encode(array("status"=>$status, "response" =>$response)));

?>