<?php 
require "load.php";
$reports = reprts();
$user_id = $_SESSION["user_id"] ;
$product_id = $_POST["product_id"];
$project_id = $_POST["project_id"];
$normally_hours = $_POST["normally_hours"];
$normally_minutes = $_POST["normally_minutes"];
$overtime_hours = $_POST["overtime_hours"];
$overtime_minutes = $_POST["overtime_minutes"];

$cont = count($normally_hours);
for($i=1;$i<=$count;$i++) {
    $nh=$normally_hours[$i];
    $nm=$normally_minutes[$i];
    $oh=$overtime_hours[$i];
    $om=$overtime_minutes[$i];
}

?>