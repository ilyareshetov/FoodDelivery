<?php
require_once 'connection.php';
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homemade Food Delivery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <img src="/images/logo.png" class="float">
    <input type="search" name="search" placeholder="search" class="float">
    <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="pages/aboutUs.php">About Us</a></li>
        <li><a href="pages/standard.php">Ingredients Standard</a></li>
        <li><a href="pages/faq.php">FAQs</a></li>
        <li><a href="pages/contact.php">Contact Us</a></li>
        <li><a href="pages/siteMap.php">Site Map</a></li>
        <?php
            if (isset($_COOKIE['user'])) {
                print '<li><a href="pages/sellFood.php">Sell Food</a></li>';
                print '<li><a href="pages/myCart.php">My Cart</a></li>';
                print '<li><a href="pages/myProfile.php">My Profile</a></li>';
            }
            else {
                print '<li><a href="pages/login.php">Log In</a></li>';
                print '<li><a href="pages/register.php">Register</a></li>';
            }
        ?>

    </ul>
</header>
<div class="clear"></div>

<?php
// Main content
$get = $db->query('SELECT * FROM items');
while($row = $get->fetch_assoc()) {
?>
   <a class = "itemA" href="pages/addToCard.php?id=<?=$row['id'] ?>" >
    <div class="item">
        <div class = "itemImg" style = "background-image: url(<?=$row['image'] ?>);background-repeat: no-repeat;background-size: 100% auto;"></div>
        <br>
        <h2><?=$row['name'] ?></h2>
        <h3>$ <?=$row['price'] ?></h3>
        <p><?=$row['description'] ?></p>
    </div>
    </a>
<?php
}


require_once 'pages/footer.php';