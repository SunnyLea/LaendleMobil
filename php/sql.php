<?php
	$link = false;
	
	$MYSQL_IP = 'localhost';
	$MYSQL_USER = 'root';
	$MYSQL_PW = '';
	$MYSQL_DB = 'Laendlemobil';
	
    function getConnection(){
        global $link, $MYSQL_IP, $MYSQL_USER, $MYSQL_PW, $MYSQL_DB;
        if( $link )
            return $link;
        $link = mysqli_connect($MYSQL_IP, $MYSQL_USER, $MYSQL_PW, $MYSQL_DB) or die('Could not connect to server.' );
        return $link;
    }
    
    function cleanUpDB(){
        global $link;
        if( $link != false )
            mysqli_close($link);
        $link = false;
    }
?>