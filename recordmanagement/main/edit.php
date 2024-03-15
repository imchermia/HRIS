<?php
// configuration
include('connect.php');

// new data
$date = $_POST['date'];
$doc_type = $_POST['doc_type'];
$desc = $_POST['desc'];
$office = $_POST['office'];
$status = $_POST['status'];
$id = $_POST['memids'];
$dateo = $_POST['dateo'];
$rb = $_POST['rb'];
$ft = $_POST['ft'];
// query
$sql = "UPDATE transaction 
        SET date=?, doc_type=?, description=?, office=?, status=?, dateout=?, receive_by=?, ft=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($date,$doc_type,$desc,$office,$status,$dateo,$rb,$ft,$id));
header("location: index.php");

?>