<?php
require_once '../connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$title = 'Sell Food';


if (isset($_COOKIE['user'])) {
    if (isset($_POST['submit'])) {
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
        $uploadfile = $uploaddir . $_FILES['image']['name'];
        $path = 'images/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
        $get = $db->query("SELECT id FROM users WHERE login = '{$_COOKIE['user']}'");
        $res = $get->fetch_assoc();
        $db->query("INSERT INTO items (name, image, price, description, id_user) VALUES ('{$_POST['name']}', '{$path}', '{$_POST['price']}', '{$_POST['description']}', '{$res['id']}')");
        header('Refresh: 0; url=sellFood.php');

    } else {
        require_once 'header.php';
        $get = $db->query("SELECT id FROM users WHERE login = '{$_COOKIE['user']}'");
        $res = $get->fetch_assoc();
        $get = $db->query("SELECT * FROM items WHERE id_user = '{$res['id']}'");
        $raw = $get->fetch_assoc();
        //var_dump($row);

        if ($raw != null) {
            print '<h2>Your products in our store:</h2>';
            ?>
            <div class="item">
                <div class = "itemImg" style = "background-image: url(../<?=$raw['image'] ?>);background-repeat: no-repeat;background-size: 100% auto;"></div>
                <br>
                <h2><?=$raw['name'] ?></h2>
                <h3>$ <?=$raw['price'] ?></h3>
                <p><?=$raw['description'] ?></p>
                <a href="deleteItem.php?id=<?= $raw['id'] ?>">Delete</a>
            </div>
            <?php
            while ($row = $get->fetch_assoc()):
                ?>
                <div class="item">
                    <div class = "itemImg" style = "background-image: url(../<?=$row['image'] ?>);background-repeat: no-repeat;background-size: 100% auto;"></div>
                    <br>
                    <h2><?=$row['name'] ?></h2>
                    <h3>$ <?=$row['price'] ?></h3>
                    <p><?=$row['description'] ?></p>
                    <a href="deleteItem.php?id=<?= $row['id'] ?>">Delete</a>
                </div>
            <?php endwhile;

        }
        else {
            print '<h2>You have not added any items yet.</h2>';
        }
        ?>
        <div class="clear"></div>
        <div class = "formBlock">
            <form enctype="multipart/form-data" method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <h2>Here you can add new item</h2><br>
                <input type="text" name="name" placeholder="Write title of item" required><br>
                <p>Select image for item</p>
                <input type="file" name="image" placeholder="Write image??" accept="image/*" required><br>
                <input type="text" name="price" placeholder="Write price" required><br>
                <input type="text" name="description" placeholder="Write description" required><br>

                <input type="submit" name="submit" value="Add To Shop">
            </form>
        </div>
        <?php
    }
}
else {
    require_once 'header.php';
    print 'Access denied!';
}

require_once 'footer.php';