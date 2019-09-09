<?php
$title = 'Contact Us';
require_once 'header.php';
?>
<ul>
    <li>Company phone number (210-123-11-11)</li>
    <li>E-mail address (homemadefooddelivery@google.com)</li>
    <li>Mail address (11234 Food Ridge Dr, zip code:12345)</li>
</ul>
<?php
if (isset($_POST['submit'])) {
    $message = <<<EOD
Name: {$_POST['name']}
Phone: {$_POST['phone']}
Email: {$_POST['email']}
Question: {$_POST['question']}
EOD;

    if (mail('you_email@mail.com', 'New question', $message)) {
        print 'Message was succeeded sent!';
    }
    else {
        print 'Error, please repeat your question.';
    }
}
else {
    ?>
<div class = "formBlock">
    <form method="post">
        <h2>Here you can ask us a question</h2>
        <input type="text" name="name" placeholder="Your name" required><br>
        <input type="text" name="email" placeholder="Your email" required><br>
        <input type="text" name="phone" placeholder="Your phone number"><br>
        <textarea name="question">Your question</textarea><br>

        <input type="submit" name="submit" value="Send question">
    </form>
</div>
    <?php
}

require_once 'footer.php';