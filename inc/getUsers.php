<?php
	
	include_once 'config.inc.php';

 $json = array();
 $op = $_POST['op'];
$json['users'] ="";
 if($op == 1) {
 	try{
 		$stmt = $con->prepare("SELECT *FROM coordinates");
 		$stmt->execute();
 		$res = $stmt->fetchAll();
 		foreach ($res as $value) {
 		$json['users'] .= "<tr><th>$value[user_id]</th><th>$value[latitude].$value[longitude]</th><th><button class='btn btn-success mapview' id=$value[user_id] value=$value[user_id]>View</button></th></tr>";	
 		}
 	}
 	catch(PDOException $e) {
 		$json['error'] = $e->getMessage();
 	}
 } 
 if($op == 2) {
 	$user_id = $_POST['user_id'];
 	$stmt = $con->prepare("SELECT *FROM coordinates WHERE user_id=?");
 		$stmt->bindValue(1,$user_id);
 		$stmt->execute();
 		$res = $stmt->fetchAll();
 		foreach ($res as  $value) {
 			$json['latitude'] = $value['latitude'];
			$json['longitude'] = $value['longitude'];
 		}
 }
echo json_encode($json);
?>