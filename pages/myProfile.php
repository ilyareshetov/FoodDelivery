<?php
require_once '../connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$title = 'My Profile';


if (isset($_POST['submit'])) {
    $db->query("UPDATE users SET name = '{$_POST['name']}', surname = '{$_POST['surname']}', about = '{$_POST['about']}', password = '{$_POST['password']}' WHERE login = '{$_COOKIE['user']}'");
    header('Refresh: 0; url=myProfile.php');
} else {
    require_once 'header.php';
    $get = $db->query("SELECT * FROM users WHERE login = '{$_COOKIE['user']}'");
    $res = $get->fetch_assoc();
    ?>
<div class = "formBlock">
    <form method="post">
        <p>Here you can see and edit information about yourself!</p>
        <p>Your name: </p><input type="text" name="name" value="<?=$res['name'] ?>"><br>
        <p>Your surname:</p><input type="text" name="surname" value="<?=$res['surname'] ?>"><br>
        <p>Information about you:</p><textarea name="about"><?=$res['about'] ?></textarea><br>
        <p>Current password:</p><input type="text" name="password" value="<?=$res['password'] ?>"><br>

        <p></p><input type="submit" name="submit" value="Change info">
    </form>
</div>

    <?php
}



require_once 'footer.php';