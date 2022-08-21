<?php
require "security.php";
session_start();
$dsn = "mysql: host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8mb4";
try {
    $db = new PDO($dsn, USERNAME, PASSWORD);

} catch (PDOException $error) {
    echo "خطا در برقراری ارتباط با دیتابیس";

}
/////////////////////////////////
function auth()
{
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }
}

/////////////////////////////////
function getprojects()
{
    global $db;

    $sql = "SELECT * FROM `projects`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $projects;
}

//////////////////////////////////////
function getproducts(int $project_id)
{
    global $db;

    $sql = "SELECT * FROM `product` WHERE `project_id`= :project_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":project_id", $project_id);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

////////////////////////////
function getactivity()
{
    global $db;

    $sql = "SELECT * FROM activity";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $activity = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $activity;
}

/////////////////////////////////////
function addreport($user_id, $product_id, $project_id, $activity_id, $normally_hours, $normally_minutes, $overtime_hours, $overtime_minutes)
{
    global $db;

    $sql = "INSERT INTO `reports`(`user_id`, `product_id`,`project_id`, `activity_id`, `normally_hours`, `normally_minutes`, `overtime_hours`, `overtime_minutes`) VALUES 
	(:user_id, :project_id , :product_id,:activity_id, :normally_hours, :normally_minutes, :overtime_hours, :overtime_minutes)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("user_id", $user_id);
    $stmt->bindParam("product_id", $product_id);
    $stmt->bindParam("project_id", $project_id);
    $stmt->bindParam("activity_id", $activity_id);
    $stmt->bindParam("normally_hours", $normally_hours);
    $stmt->bindParam("normally_minutes", $normally_minutes);
    $stmt->bindParam("overtime_hours", $overtime_hours);
    $stmt->bindParam("overtime_minutes", $overtime_minutes);
    $stmt->execute();
}

//////////////////////////////////////
function GetProjectIdByProduct(int $product_id)
{
    global $db;

    $sql = "SELECT `project_id` FROM `product` WHERE `id`= :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    return $r;
}