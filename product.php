<?php
require "load.php";

$project_id = $_POST["project_id"];

$products = getproducts($project_id);
?>
<form action="activity.php" method ="POST">
<input type = "hidden" name="project_id" value="<?= $product_id ?>">
    <select name = "product_id">
        <?php foreach($products as $product) {?>
                <option name="product_id" value="<?php echo $product["id"]?>"><?= $product["name"] ?>-<?= $product["code"] ?></option>
        <?php } ?>     
    </select>    
</form>    