<?php

	session_start();
	
	$zapraszajacyid = $_SESSION['id'];
	$zaproszonyid = $_SESSION['z_id'];

	$oczekiwanie = "Oczekiwanie";

	//$_SESSION['znajomy'] = $znajomy;
	
	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}

	$zapytanie = "insert into znajomi (zapraszajacyid, zaproszonyid, stat) values 
	('$zapraszajacyid', '$zaproszonyid', '$oczekiwanie')";	
	
	$_SESSION['oczekiwanie'] = $oczekiwanie;	
	
	$wynik = $db->query($zapytanie);
	
	$db->close();

	header('Location: profil.php');	
?>