<?php
require_once '../connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$title = 'Add to Card';


if (isset($_GET['id'])) {
    require_once 'header.php';
    $get = $db->query("SELECT * FROM items WHERE id = {$_GET['id']}");
    $row = $get->fetch_assoc();
    ?>
    <div class="item">
        <div class = "itemImg" style = "background-image: url(../<?=$row['image'] ?>);background-repeat: no-repeat;background-size: 100% auto;"></div>
        <br>
        <h2><?=$row['name'] ?></h2>
        <h3>$ <?=$row['price'] ?></h3>
        <p><?=$row['description'] ?></p>
    </div>
    <form action="addToCard.php" method="post" class="clear">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <input class = "buttons" type="submit" name="submit" value="Add to Cart">
    </form>
<?php
}

if (isset($_POST['submit'])) {
    if (isset($_COOKIE['user'])) {
        $get = $db->query("SELECT id FROM users WHERE login = '{$_COOKIE['user']}'");
        $user = $get->fetch_assoc();
        $get = $db->query("SELECT id FROM orders WHERE id_user = '{$user['id']}'");
        $res = $get->fetch_assoc();
        $get = $db->query("SELECT * FROM items WHERE id = '{$_POST['id']}'");
        $item = $get->fetch_assoc();
        if (isset($res['id'])) {
            $db->query("UPDATE orders SET price = price + {$item['price']} WHERE id = {$res['id']}");
            $db->query("INSERT INTO order_products (id_order, id_product) VALUES ({$res['id']}, {$item['id']})");
            header( 'Refresh: 3; url=../index.php' );
            require_once 'header.php';
            print '<p>Item successfully added, you will be redirected to the home page</p>';
        }
        else {
            $db->query("INSERT INTO orders (id_user, price) VALUES ({$user['id']}, {$item['price']})");
            $get = $db->query("SELECT id FROM orders WHERE id_user = '{$user['id']}'");
            $res = $get->fetch_assoc();
            $db->query("INSERT INTO order_products (id_order, id_product) VALUES ({$res['id']}, {$item['id']})");
            header( 'Refresh: 3; url=../index.php' );
            require_once 'header.php';
            print '<p>Item successfully added, you will be redirected to the home page</p>';
        }

    }
    else {
        require_once 'header.php';
        print '<p>Only registered user can add item to Cart, please login or register!</p>';
    }
}


require_once 'footer.php';