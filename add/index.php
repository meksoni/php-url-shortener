<?php 

include '../db_connect.php';

$db = new Database("localhost", "url_shortener", "root", ""); // add password from db if you have
$db = $db->connect();

$url = $_POST['long_url'];

$query = "INSERT INTO urls (long_url) VALUES (:long_url)";
$stmt = $db->prepare($query);
$params = array(
	"long_url" => $url
);
$result = $stmt->execute($params);
header("location: ../?i=" . $db->lastInsertId());