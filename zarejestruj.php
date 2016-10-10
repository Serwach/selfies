<?php
	session_start();

	require_once "connect.php";

	if ((!isset($_POST['nick'])) || (!isset($_POST['email'])) || (!isset($_POST['haslo1'])) || (!isset($_POST['haslo2'])))
	{
		$_SESSION['e_pole'] = '<span style="color:#800000">Prosze wypełnić wszystkie pola!<br/></span>';
		header('Location: index.php');
		exit();
	}
	
	$nick = $_POST['nick'];
	$email = $_POST['email'];
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];
	
	$walidacja = true;
	
	if(strlen($nick) < 3 || strlen($nick) > 20) 
	{
		$_SESSION['e_imie'] = '<span style="color:#800000">Nick powinien mieć od 3 do 20 znaków!</span>';
		$walidacja = false;
		header('Location: index.php');		
	}	
	
	$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
	if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
	{
		$walidacja = false;
		$_SESSION['e_email']= '<span style="color:#800000">Podaj poprawny adres e-mail!</span>';
	}
	
	if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
	{
		$walidacja = false;
		$_SESSION['e_haslo'] = '<span style="color:#800000">Hasło musi posiadać od 8 do 20 znaków!</span>';
	}
		
	if ($haslo1 != $haslo2)
	{
		$walidacja = false;
		$_SESSION['e_haslo'] = '<span style="color:#800000">Podane hasła nie są identyczne!</span>';
	}	

	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

	if($walidacja)
	{	
		$db = @new mysqli($host, $db_user, $db_password, $db_name);

		if(mysqli_connect_errno())
		{
			echo 'Błąd: Połączenie z bazą danych nie powiodło się. Spróbuj ponownie później.';
			exit;
		}
	
		$zapytanie = "insert into uzytkownicy (email, nick, haslo) values 
		('$email', '$nick', '$haslo_hash')";

		$wynik = $db->query($zapytanie);

		$db->close();

		header('Location: wyloguj.php');		
	}
	

?>