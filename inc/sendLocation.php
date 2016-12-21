<?php
	include_once 'config.inc.php';

 $json = array();
 $user_id = $_POST['user_id'];
 $latitude = $_POST['latitude'];
 $longitude = $_POST['longitude'];


$json['latitude'] = $latitude;
$json['longitude'] = $longitude;

	try {
			$stmt = $con->prepare("SELECT user_id FROM coordinates WHERE user_id=?");	
			$stmt->bindValue(1,$user_id);
			$stmt->execute();
			$cnt = $stmt->fetchAll();

			if(count($cnt) >=1) {
				$stmt = $con->prepare("UPDATE coordinates  SET latitude=?, longitude=? WHERE user_id=?");
				$stmt->bindValue(1,$latitude);
				$stmt->bindValue(2,$longitude);
				$stmt->bindValue(3,$user_id);
				$stmt->execute();
			} else {
				$stmt = $con->prepare("INSERT INTO coordinates(user_id,latitude,longitude) VALUES(?,?,?)");
				$stmt->bindValue(1,$user_id);
				$stmt->bindValue(2,$latitude);
				$stmt->bindValue(3,$longitude);
				$stmt->execute();
			}
		}
	catch(PDOException $e){
		$json['error'] = $e->getMessage();
	}

echo json_encode($json);
?>