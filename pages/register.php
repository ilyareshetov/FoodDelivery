<?php
require_once '../connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$title = 'Register';


if (isset($_POST['submit'])) {
    $get = $db->query("SELECT login FROM users WHERE login = '{$_POST['login']}'");
    if (!$get) {
        $db->query("INSERT INTO users (login, password, name, surname) VALUES ('{$_POST['login']}', '{$_POST['password']}', '{$_POST['name']}', '{$_POST['surname']}');");
        SetCookie('user', "{$_POST['login']}", 0, '/');
        header( 'Refresh: 3; url=../index.php' );
        print 'Account created successfully, you will be redirected in 3 seconds.';
    }
    else {
        print '<p>User with this login already created!</p>';
    }

}
else {
    require_once 'header.php';
?>
<div class = "formBlock">
    <h1>Registration</h1>
    <form method="post">
        <input type="text" name="login" placeholder="Write your login"><br>
        <input type="password" name="password" placeholder="Write password"><br>
        <input type="text" name="name" placeholder="Write your name"><br>
        <input type="text" name="surname" placeholder="Write your surname"><br>

        <input type="submit" name="submit" value="Register account">
    </form>
</div>
<?php
}



require_once 'footer.php';
