<?php

	session_start();

	$id = $_SESSION['id'];

	$nick = $_POST['nick'];
	$tresc = $_POST['tresc'];
	
	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}
	
	$id = $_SESSION['id'];

	$zapytanie1 = "select id from uzytkownicy where uzytkownicy.nick = '$nick'";

	$wynik1 = $db->query($zapytanie1);

	$krotka1 = $wynik1->fetch_assoc();

	$idwysylajacego = $krotka1['id'];		
	
	$zapytanie2 = "insert into wiadomosci (idwysylajacego, idodbiorcy, tresc, data) values ('$idwysylajacego', '$id', '$tresc', now())";
	
	$wynik2 = $db->query($zapytanie2);

	$db->close();

	header('Location: wiadomosci.php');
	
?>