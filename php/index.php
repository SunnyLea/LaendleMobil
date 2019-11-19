<?php
	require('sql.php');
	
	if(array_key_exists("abfahrt", $_POST) && array_key_exists("typ", $_POST) && array_key_exists("ankunft", $_POST)) {
		if($_POST["typ"] == 'ins') {
			$sql = "INSERT INTO tryfahrt (`Abfahrt`, `Ankunft`) VALUES ('".$_POST["abfahrt"]."', '".$_POST["ankunft"]."');";
			mysqli_query(getConnection(), $sql);
			if(mysqli_error(GetConnection())){
				echo "SQL Fehler:".mysqli_error(getConnection());
			}else{
				echo 'Geloggt '.$_POST["abfahrt"].'!';
			}
		} else if($_POST["typ"] == 'read') {
			$sql = "SELECT * FROM tryfahrt WHERE `abfahrt` = '".$_POST["abfahrt"]."';";
			mysqli_query(getConnection(), $sql);
			if(mysqli_error(GetConnection())){
				echo "SQL Fehler:".mysqli_error(getConnection());
			}else{
				$ret = mysqli_query(getConnection(), $sql);
				if(mysqli_num_rows($ret) > 0) {
					$row = mysqli_fetch_assoc($ret);
					echo 'Found user '.$_POST["abfahrt"].'!';
				} else {
					echo 'User not found!';
				}
				mysqli_free_result($ret);
			}
		}
	} else {
		echo "Params missing!";
	}
?>