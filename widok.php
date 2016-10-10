<?php
include_once 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading With PHP and MySql</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>File Uploading With PHP and MySql</label>
</div>
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...<label><a href="index.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php


        require_once "connect.php";
    
    $db = @new mysqli($host, $db_user, $db_password, $db_name);
    

      $id = $_SESSION['id'];    
    $zapytanie = "select zdjecia.plik, zdjecia.typ from uzytkownicy, zdjecia where uzytkownicy.id=zdjecia.iduzytkownika 
    and zdjecia.iduzytkownika='$id'";
    
            

        $wynik = $db->query($zapytanie);

        $ile = $wynik->num_rows;

        for($i=0; $i<$ile; $i++)
        {
            ?>
            $krotka = $wynik->fetch_assoc();    
            echo "<div id=\"zdjecie\">";
            $grafika = "photos/".$krotka['plik'];
            echo "<img src = \"<?php echo  $grafika; ?>\"/>";
            echo "</div>";
            <?php
            
        }
?>
    
</div>
</body>
</html>