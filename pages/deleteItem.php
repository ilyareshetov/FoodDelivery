<?php
require_once '../connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$title = 'Delete Item';


if (isset($_POST['submit'])) {
    $db->query("DELETE FROM items WHERE id = '{$_POST['id']}'");
    header('Refresh: 0; url=sellFood.php');
}
else {
    require_once 'header.php';
    $get = $db->query("SELECT name FROM items WHERE id = '{$_GET['id']}'");
    $res = $get->fetch_assoc();
    ?>
<div class = "formBlock">
    <form method="post">
        <h2>Do you really want to delete <?=$res['name'] ?>?</h2>
        <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
        <input type="submit" name="submit" value="Yes">
        <span class = "spButton"><a href="sellFood.php">Cancel</a></span>
    </form>
</div>
    <?php
}

require_once 'footer.php';