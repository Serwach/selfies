<?php

  session_start();

  $id = $_SESSION['id'];

  require_once("connect.php");
    
  $db = @new mysqli($host, $db_user, $db_password, $db_name);
    
  if($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }  

  $plik = addslashes(file_get_contents($_FILES['zdjecie']['tmp_name']));

  $zapytanie1 = "insert into zdjecia (iduzytkownika, plik) values ('$id', '$plik')";

  $wynik1 = $db->query($zapytanie1);

  $zapytanie2 = "update uzytkownicy set profilowe='$plik' where uzytkownicy.id='$id'";

  $wynik2 = $db->query($zapytanie2);

  $zapytanie3 = "update uzytkownicy set zdjecia=zdjecia+1  where uzytkownicy.id='$id'";
  
  $wynik3 = $db->query($zapytanie3);

  header("Location: profil.php");

?>