<?php

// if(!empty($_POST["submit"])){

$fahrt_id = $_POST['fahrt_id'];
$name = $_POST['name_buchung'];
$email = $_POST['email_buchung'];

// echo $fahrt_id;

// echo $email;
$status = "failure";
$response = "Buchung nicht erfolgreich";

$con = mysqli_connect("localhost", "root", "", "Laendlemobil") or die("Could not connect to server.");


$eintrag = "INSERT INTO BUCHUNGEN (fahrt_id, name, email) VALUES ('".$fahrt_id."','".$name."','".$email."');";


if (mysqli_query($con, $eintrag)) {

$status = "success";
$response =  "Buchung erfolgreich";

}



exit(json_encode(array("status"=>$status, "response" =>$response)));

// if($eintragen == true){
//     echo "Entry successful";
//   //  header ( 'Location: Fahrt_anbieten.html' );
// } else{
//     echo "Error";
// }


?>