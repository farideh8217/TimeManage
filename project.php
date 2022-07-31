<?php
require "load.php";

$projects = getprojects();
?>
<form action="product.php" method="POST">
    <select name="project_id">
        <?php foreach($projects as $project) { ?>
            <option value="<?php echo $project["id"]?>"><?php echo $project["name"]?></option>
        <?php } ?>    
    </select>  
    <input type="submit" value="submit" name="submit">  
</form>    