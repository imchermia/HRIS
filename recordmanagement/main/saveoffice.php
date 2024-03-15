<?php
include('connect.php');	

$officename = $_POST['officename'];

// query
$sql = "INSERT INTO offices (name) VALUES (:sas)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$officename));
header("location: offices.php");


?>