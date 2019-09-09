<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <img src="/images/logo.png" class="float">
    <input type="search" name="search" placeholder="search" class="float">
    <ul class="float" id="menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
        <li><a href="standard.php">Ingredients Standard</a></li>
        <li><a href="faq.php">FAQs</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="siteMap.php">Site Map</a></li>
        <?php
            if (isset($_COOKIE['user'])) {
                print '<li><a href="sellFood.php">Sell Food</a></li>';
                print '<li><a href="myCart.php">My Cart</a></li>';
                print '<li><a href="myProfile.php">My Profile</a></li>';
            } else {
                print '<li><a href="login.php">Log In</a></li>';
                print '<li><a href="register.php">Register</a></li>';
            }
        ?>
    </ul>
</header>
<div class="clear"></div>