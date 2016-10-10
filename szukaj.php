<?php

    if(isset($_SESSION['z_id']))  unset($_SESSION['z_id']);
    if(isset($_SESSION['z_nick']))  unset($_SESSION['z_nick']);
    if(isset($_SESSION['z_zdjecie'])) unset($_SESSION['z_zdjecie']);
    if(isset($_SESSION['z_posty'])) unset($_SESSION['z_posty']);
    if(isset($_SESSION['z_zdjecia'])) unset($_SESSION['z_zdjecia']);
    if(isset($_SESSION['z_znajomi']))  unset($_SESSION['z_znajomi']);
    if(isset($_SESSION['oczekiwanie']))  unset($_SESSION['oczekiwanie']); 

	session_start();

	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}
	
	$nick = $_POST['nick'];

	$zapytanie = "select uzytkownicy.id, uzytkownicy.nick, uzytkownicy.profilowe, uzytkownicy.posty, uzytkownicy.zdjecia, 
	uzytkownicy.znajomi from uzytkownicy where uzytkownicy.nick = '$nick'";	
	
	$wynik = $db->query($zapytanie);
		
	$ile_wynikow = $wynik->num_rows;
	
	
	if($wynik)
	{
		$krotka = $wynik->fetch_assoc();
		$_SESSION['z_id'] = $krotka['id'];
		$_SESSION['z_nick'] = $krotka['nick'];
		$_SESSION['z_profilowe'] = $krotka['profilowe'];	
		$_SESSION['z_posty'] = $krotka['posty'];
		$_SESSION['z_zdjecia'] = $krotka['zdjecia'];
		$_SESSION['z_znajomi'] = $krotka['znajomi'];	
		$wynik->free_result();
	}
	
	$db->close();

	header('Location: wynikwyszukania.php');
	
?>