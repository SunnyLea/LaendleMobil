<?php

// if(!empty($_POST["submit"])){
$fahrt_id = $_POST["fahrt_id"];
$name = $_POST["name_buchung"];
$email = $_POST["email_buchung"];

echo $fahrt_id;
echo $name;
echo $email;

$con = mysqli_connect("localhost", "root", "", "Laendlemobil") or die("Could not connect to server.");
$eintrag = "INSERT INTO buchungen (fahrtID, name, email)
VALUES ('$fahrt_id', '$name', '$email')";
$eintragen = mysqli_query($con, $eintrag);

if($eintragen == true){
    echo "Entry successful";
  //  header ( 'Location: Fahrt_anbieten.html' );
} else{
    echo "Error";
}

//}
?>