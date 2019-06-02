<?php
$server= "localhost";
$database  = 'news_article';
$password = "";
$username = "root";

$conn = new mysqli($server, $username, $password,$database);

if($conn->connect_error){
	die("Connection Failed". $connect_error);
}

?>