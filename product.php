<?php
require "load.php";

auth();

$project_id = $_POST["project_id"];

$products = getproducts($project_id);
?>
<form action="activity.php" method="POST">
    <select name="product_id">
        <?php foreach ($products as $product) { ?>
            <option name="product_id" value="<?php echo $product["id"] ?>"><?= $product["name"] ?>
                -<?= $product["code"] ?></option>
        <?php } ?>
        <input type="submit" value="submit" name="submit">
    </select>
</form>    