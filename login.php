<?php
require "load.php";

if (isset($_POST["username"],$_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql="SELECT * FROM `user` WHERE `user_name`= :username and `password`= :password";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false) {
        echo "not username and password";
    }else {
         $_SESSION["user_id"] = $user["id"];
         header("Location: project.php");
    }
}

?>
<form action="" method="POST">
    username:<input type="text" name="username"><br>
    password:<input type="text" name="password"><br>
    <input type="submit" name="submit" value="submit">

</form>
    