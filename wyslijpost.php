<?php

	session_start();
	
	$tresc = $_POST['tresc'];
	
	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}	
	
	$id = $_SESSION['id'];
	
	$zapytanie1 = "insert into posty (idwysylajacego, tresc) values ('$id', '$tresc')";
	
	$wynik1 = $db->query($zapytanie1);
	
	$zapytanie2 = "update uzytkownicy set posty = posty + 1 where uzytkownicy.id='$id'";
	
	$wynik12 = $db->query($zapytanie2);

	$db->close();

	header('Location:osczasu.php');
	
?>