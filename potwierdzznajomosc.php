<?php

	session_start();

	$id = $_SESSION['id'];

	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}
	
	$zapytanie = "update uzytkownicy, znajomi set znajomi.stat='Znajomy' where uzytkownicy.id=znajomi.zapraszajacyid and znajomi.zaproszonyid='$id' and 
                  znajomi.stat='Oczekiwanie'";
	
	$wynik = $db->query($zapytanie);

	  $zapytanie3 = "update uzytkownicy set znajomi = znajomi + 1 where uzytkownicy.id='$id'";
	  
	  $wynik3 = $db->query($zapytanie3);

	header('Location: profil.php');

?>