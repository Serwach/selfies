<?php

	session_start();

	$id = $_SESSION['id'];

	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}
	
	$zapytanie = "update uzytkownicy, znajomi set znajomi.stat='Odrzucony' where uzytkownicy.id=znajomi.zapraszajacyid and znajomi.zaproszonyid='$id' and 
                  znajomi.stat='Oczekiwanie'";
	
	$wynik = $db->query($zapytanie);

	header('Location: profil.php');

?>