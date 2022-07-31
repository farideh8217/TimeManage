<?php
require "load.php";

$activities = getactivity();

$project_id = $_POST["project_id"];
$product_id = $_POST["project_id"];

?>
<form action="report.php" method="POST">
    <?php foreach($activities as $activity){ ?>
        <input type = "hidden" name = "product_id" value = " <?= $product_id ?> ">
        <input type = "hidden" name = "project_id" value = " <?= $product_id ?> ">
        <?= $activity['name']; ?><br>
        <select name="normally_hours[ <?= $activity['id']?> ]">
            <?php for($i = 0; $i<=9; $i++){ ?>
                <option value = "<?= $i ?>" > <?= $i ?>H </option>
            <?php } ?>
        </select>

        <select name="normally_minutes[ <?= $activity['id']?> ]">
            <?php for($i = 0; $i<=55; $i += 5){ ?>
                <option value = "<?= $i ?>" > <?= $i ?>M </option>
            <?php } ?>
        </select><br>

        <select name="overtime_hours[ <?= $activity['id']?> ]">
            <?php for($i = 0; $i<=9; $i++){ ?>
                <option value = "<?= $i ?>" > <?= $i ?>H </option>
            <?php } ?>
        </select>

        <select name="overtime_minutes[ <?= $activity['id']?> ]">
            <?php for($i = 0; $i<=9; $i++){ ?>
                <option value = "<?= $i ?>" > <?= $i ?>M </option>
            <?php } ?>
        </select><br><br><br>
    <?php } ?>
<input name = "activity_submit" type = "submit">
</form> 
</form>