<?php

	session_start();

	$id = $_SESSION['id'];

	$email = $_POST['email'];
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];

	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}

	$zapytanie = "select * from uzytkownicy where id='$id'";
			
	$wynik = $db->query($zapytanie);	

	$wiersz = $wynik->fetch_assoc();

	if (password_verify($haslo1, $wiersz['haslo']))
	{		
		$zapytanie = "update uzytkownicy set email='$email' where id='$id'";
	
		$wynik = $db->query($zapytanie);
		header('Location: ustawienia.php');
	}

?>