<?php

	session_start();

	$id = $_SESSION['id'];

	$tresc = $_POST['tresc'];

	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}

	$zapytanie = "insert into admin (iduzytkownika, tresc) values ('$id', '$tresc')";
			
	$wynik = $db->query($zapytanie);	

	header('Location: ustawienia.php');

?>