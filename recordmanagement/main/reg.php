<?php
include('connect.php');	

$date = $_POST['date'];
$doc_type = $_POST['doc_type'];
$desc = $_POST['desc'];
$office = $_POST['office'];
$status = $_POST['status'];
$dateo = $_POST['dateo'];
$rb = $_POST['rb'];
$ft = $_POST['ft'];

// query
$sql = "INSERT INTO transaction (date,doc_type,description,office,status,dateout,receive_by,ft) VALUES (:sas,:asas,:asafs,:offff,:statttt,:dot,:rd,:ft)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$date,':asas'=>$doc_type,':asafs'=>$desc,':offff'=>$office,':statttt'=>$status,':dot'=>$dateo,':rd'=>$rb,':ft'=>$ft));
header("location: index.php");


?>