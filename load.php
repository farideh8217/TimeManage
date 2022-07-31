<?php
require "security.php";
session_start();
$dsn = "mysql: host=".HOST.";dbname=".DBNAME.";charset=utf8mb4";
try{
	$db = new PDO($dsn,USERNAME,PASSWORD);
	
}catch(PDOException $error){
	echo "خطا در برقراری ارتباط با دیتابیس";
	
}
/////////////////////////////////
function getprojects() {
	global $db;

	$sql = "SELECT * FROM `projects`";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $projects;
}
//////////////////////////////////////
function getproducts(int $project_id) {
	global $db;

	$sql = "SELECT * FROM `product` WHERE `project_id`= :project_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(":project_id",$project_id);
	$stmt->execute();
	$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $products;
}
////////////////////////////
function getactivity(){
	global $db;

	$sql = "SELECT * FROM activity";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$activity = $stmt->fetchall(PDO::FETCH_ASSOC);
	return $activity;
}
/////////////////////////////////////
function reports() {
	global $db;

	
}