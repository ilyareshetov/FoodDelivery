<?php
require_once '../connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$title = 'My Cart';


if (isset($_POST['submit'])) {
    if (!isset($_POST['address'])) {
        require_once 'header.php';
        ?>
    <div class = "formBlock">
        <h1>Checkout</h1>
        <form method="post">
            <input type="hidden" name="user" value="<?=$_POST['user'] ?>">
            <input type="text" name="address" placeholder="Write Receipt Address "><br>
            <input type="submit" name="submit" value="Continue">
        </form>
    </div>
        <?php
    }
    else {
        $db->query("UPDATE orders SET receiptAddress = '{$_POST['address']}', status = 1 WHERE id_user = {$_POST['user']}");
        header( 'Refresh: 3; url=../index.php' );
        require_once 'header.php';
        print '<p>Your order is accepted for processing, thanks!</p>';
    }
}
else {
    require_once 'header.php';
    $get = $db->query("SELECT orders.status FROM orders JOIN users ON orders.id_user = users.id WHERE users.login = '{$_COOKIE['user']}'");
    $flag = $get->fetch_assoc();
    if ($flag['status']) {
        print '<p>Your order is in processing, expect delivery!</p>';
    }
    else {
        $get = $db->query("SELECT items.image, items.name, items.price, items.description FROM users JOIN orders ON users.id = orders.id_user JOIN order_products ON order_products.id_order = orders.id JOIN items ON order_products.id_product = items.id WHERE users.login = '{$_COOKIE['user']}'");
        while ($row = $get->fetch_assoc()) {
                ?>
                <div class="item">
                    <div class = "itemImg" style = "background-image: url(../<?=$row['image'] ?>);background-repeat: no-repeat;background-size: 100% auto;"></div>
                    <br>
                    <h2><?=$row['name'] ?></h2>
                    <h3>$ <?=$row['price'] ?></h3>
                    <p><?=$row['description'] ?></p>
                </div>
                <?php
            }

        ?>

        <form method="post" class="clear">
            <input type="hidden" name="user" value="<?= $user['id'] ?>">
            <input class = "buttons" type="submit" name="submit" value="Proceed to Checkout">
        </form>
        <?php
    }
}

require_once 'footer.php';