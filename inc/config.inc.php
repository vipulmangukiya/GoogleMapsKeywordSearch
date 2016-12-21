<?php


$servername = "localhost";
$username = "root";
$password = "Vipz";
$conn = mysql_connect($servername,$username,$password);
try {
    $con = new PDO("mysql:host=$servername;dbname=maps", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    echo   $e->getMessage();
     
}

		
?>