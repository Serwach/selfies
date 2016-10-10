<?php

	session_start();
	
	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$id=$_SESSION['id'];
	
	$zapytanie = "update uzytkownicy set zalogowany='nie' where id='$id'";
			
	$rezultat = $db->query($zapytanie);	
	
	$db->close();		
	
	session_unset();
	
	header('Location: index.php');
?>