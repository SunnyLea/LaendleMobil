<?php

if(!empty($_POST["submit"])){
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
$abfahrtsort = $_POST["abfahrtsort"];
$ankunftsort = $_POST["ankunftsort"];
$datum = $_POST["datum"];
$abfahrtszeit = $_POST["abfahrtszeit"];
$ankunftszeit = $_POST["ankunftszeit"];
$zeitraum = $_POST["zeitraum"];
$freieSitzplaetze = $_POST["freieSitzplaetze"];
$preis = $_POST["preis"];

$con = mysqli_connect("localhost", "root", "", "Laendlemobil") or die("Could not connect to server.");
$eintrag = "INSERT INTO drives (vorname, nachname, email, abfahrtsort, ankunftsort, datum, abfahrtszeit, ankunftszeit, zeitraum, freieSitzplaetze, preis)
VALUES ('$vorname', '$nachname', '$email', '$abfahrtsort', '$ankunftsort', '$datum', '$abfahrtszeit', '$ankunftszeit', '$zeitraum', '$freieSitzplaetze', '$preis')";
$eintragen = mysqli_query($con, $eintrag);

if($eintragen == true){
    header ( 'Location: Fahrt_anbieten.html' );
} 
}
?>