<?php
$vorname = $_POST["vorname"];
$name = $_POST["name"];
$email = $_POST["email"];
$abfahrtsort = $_POST["abfahrtsort"];
$ankunftsort = $_POST["ankunftsort"];
$datum = $_POST["datum"];
$abfahrtszeit = $_POST["abfahrtszeit"];
$ankunftszeit = $_POST["ankunftszeit"];
$freieSitzplaetze = $_POST["freieSitzplaetze"];
$preis = $_POST["preis"];

$con mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "Laendlemobil");
mysql_query($con, "insert into drives (vorname, name, email, abfahrtsort, ankunftsort, datum, abfahrtszeit, ankunftszeit, feieSitzplaetze, preis") 
values ('$vorname', '$name', '$email', '$abfahrtsort', '$ankunftsort', '$datum', '$abfahrtszeit', '$ankunftszeit', '$freieSitzplaetze', '$preis');
?>