<?php

	session_start();

	require_once "connect.php";
	
	$db = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($db->connect_errno!=0)
	{
		echo "Error: ".$db->connect_errno;
	}
	else
	{
		$email = $_POST['email'];
		$haslo = $_POST['haslo'];

		$zapytanie = "select * from uzytkownicy where email='$email'";
			
		$rezultat = $db->query($zapytanie);
			
		if($rezultat)
		{
			$wiersz = $rezultat->fetch_assoc();
			if (password_verify($haslo, $wiersz['haslo']))
			{
				unset($_SESSION['blad']);
				$_SESSION['zalogowany'] = true;
				$_SESSION['id'] = $wiersz['id'];				
				$_SESSION['nick'] = $wiersz['nick'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['zdjecie'] = $wiersz['zdjecie'];
				$_SESSION['posty'] = $wiersz['posty'];
				$_SESSION['zdjecia'] = $wiersz['zdjecia'];
				$_SESSION['znajomi'] = $wiersz['znajomi'];
				$_SESSION['stat'] = "Dodaj znajomego";						
				$rezultat->free_result();
						
				$id = $_SESSION['id'];		
						
				$zapytanie = "update uzytkownicy set aktywnosc=now() where id='$id'";
			
				$rezultat = $db->query($zapytanie);
				header('Location: osczasu.php');
			}
			else
			{
				$_SESSION['blad'] = '<span style="color:#800000"><br/>&nbsp;&nbsp;&nbsp;&nbsp;Nieprawidłowy login lub hasło!<br/><br/></span>';
				header('Location: index.php');
			}
		}
		
		$db->close();		
	}
?>