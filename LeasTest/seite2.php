<html>
    <head>
</head>
<body>
    
    <?php
    $con = mysqli_connect("localhost", "root", "", "Laendlemobil") or die("Could not connect to server.");
    //mysqli_select_db($con, "Laendlemobil") or die("No connection to database.");

    $interpret = $_POST["interpret"];
    $titel = $_POST["titel"];

    echo $interpret;
    echo $titel;

    $eintrag = "INSERT INTO playlist (interpret, titel) VALUES ('$interpret', '$titel')";
    $eintragen = mysqli_query($con, $eintrag);

    if($eintragen == true){
        echo "Entry successful";
    } else{
        echo "Error";
    }

    ?>
    </body>

</html>