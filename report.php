<?php
require "load.php";

auth();

$user_id = $_SESSION["user_id"];

if (!isset($product_id)) {
    header("Location: project.php");
    exit();
}
$product_id = $_POST["product_id"];

$arr = GetProjectIdByProduct($product_id);
if ($arr === false) {
    header("Location: project.php");
    exit();
}
$project_id = $arr["project_id"];

if (!isset($_POST["normally_hours"]) || !isset($_POST["normally_minutes"]) || !isset($_POST["overtime_hours"]) || !isset($_POST["overtime_minutes"])) {
    header("Location: project.php");
    exit();
}
$normally_hours = $_POST["normally_hours"];
$normally_minutes = $_POST["normally_minutes"];
$overtime_hours = $_POST["overtime_hours"];
$overtime_minutes = $_POST["overtime_minutes"];

$time = time();

$activities = getactivity();
foreach ($activities as $activity) {
    if (isset($normally_hours[$activity["id"]], $normally_minutes[$activity["id"]], $overtime_hours[$activity["id"]], $overtime_minutes[$activity["id"]]))
        addreport($user_id, $product_id, $project_id, $activity["id"], $normally_hours[$activity["id"]], $normally_minutes[$activity["id"]], $overtime_hours[$activity["id"]], $overtime_minutes[$activity["id"]]);
}
