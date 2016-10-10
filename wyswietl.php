<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("praca") or die(mysql_error());
if(isset($_GET['image_id'])) {
$sql = "SELECT typ, plik FROM praca WHERE id=" . $_GET['image_id'];
$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
$row = mysql_fetch_array($result);
header("Content-type: " . $row["typ"]);
echo $row["plik"];
}
mysql_close($conn);
?>