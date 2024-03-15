<?php
include('connect.php');	

$docname = $_POST['docname'];

// query
$sql = "INSERT INTO doc_type (name) VALUES (:sas)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$docname));
header("location: doctype.php");


?>