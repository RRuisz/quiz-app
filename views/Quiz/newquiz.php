<?php include './templates/header.php';?>


<h1>Neues Quiz anlegen</h1>

<form method="post">
    <input type="text" name="name">
    <select name="category">
        <?php foreach ($categories as $category){
            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
        }?>
    </select>
    <input type="submit" value="Speichern">
</form>