<?php
$title = 'Contact Us';
require_once 'header.php';
?>

<h2>Here you can find all the available pages for current user.</h2>
<ul>
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

<?php

require_once 'footer.php';
